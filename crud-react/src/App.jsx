import Create from './Components/Create';
import List from './Components/List';
import axios from 'axios';
import './index.scss';
import { useEffect, useState, useCallback } from 'react';
import Delete from './Components/Delete';
import Edit from './Components/Edit';
import Messages from './Components/Messages';

export default function App() {

  const URL = 'http://localhost/bit_projects/crud-laravel/public/api';

  const [books, setBooks] = useState(null);

  const [storeBook, setStoreBook] = useState(null);

  const [deleteBook, setDeleteBook] = useState(null);
  const [destroyBook, setDestroyBook] = useState(null);

  const [editBook, setEditBook] = useState(null);
  const [updateBook, setUpdateBook] = useState(null);

  const [messages, setMessages] = useState([]);


  const msg = useCallback((data, id = null) => {
    
    if(!id) {
        id = Math.random().toString(36).substring(2, 9);

        setMessages(m => [{ ...data, id }, ...m]);

        setTimeout(_ => {
            setMessages(m => m.filter(ms => ms.id !== id));
        }, 15000);
    } else {
    setMessages(prevMessages => prevMessages.map(prevMessageItem => prevMessageItem.id === id ? {...prevMessageItem, ...data} : prevMessageItem));
    }
    return id;
}, []);

  const closeMsg = id => {setMessages(m => m.filter(ms => ms.id !== id));}


  useEffect(_ => {
    if (null === storeBook) {
        return;
    }
    const id = 'TMP' + Math.floor(Math.random() * 1000000); // laikinas ID
    setBooks(bs => [{...storeBook, id}, ...bs]); // optimistinis atnaujinimas
    const msgId = msg({
        title: 'Storing...',
        text: 'Your book is sending to server.',
        type: 'info',
    });

    axios.post(URL + '/book', storeBook)
        .then(res => {
            console.log(res.data);
            setBooks(bs => bs.map(b => id === b.id ? {...b, id: res.data.id} : b)); // pakeiciam laikina ID tikru
            msg({
                title: 'Stored', 
                text: 'Your book was stored.', 
                type: 'success'
            }, msgId);
        })
        .catch(error => {
            console.log(error);
            setBooks(bs => bs.filter(b =>  b.id !== id)); // panaikinam laikina irasa
            msg({
                title: 'Storing Failed', 
                text: 'Your book was rejected.', 
                type: 'warning'
            }, msgId);
        });

}, [storeBook, msg]);


useEffect(_ => {
    if (null === destroyBook) {
        return;
    }

    setBooks(bs => bs.map(b => destroyBook.id === b.id ? { ...b, delete: true } : b)); // optimistinis atnaujinimas
    const msgId = msg({
        title: 'Deleting...',
        text: 'Your book is about to be deleted.',
        type: 'info',
    });

    axios.delete(URL + '/book/' + destroyBook.id)
        .then(res => {
            console.log(res.data);
            setBooks(bs => bs.filter(b =>  b.id !== destroyBook.id));
            msg({
                title: 'Deleted', 
                text: 'Your book was deleted.', 
                type: 'success'
            }, msgId);
        })
        .catch(error => {
            console.log(error);
            setBooks(bs => bs.map(b => destroyBook.id === b.id ? { ...b, delete: false } : b));
            msg({
                title: 'Deleting Failed', 
                text: 'Your book was not deleted.', 
                type: 'warning'
            }, msgId);
        });

}, [destroyBook]);

  useEffect(_ => {
    axios.get(URL + '/books')
    .then(res => {
        setBooks(res.data)
    })
    .catch(error => {
        console.log(error)
    });
}, []);

useEffect(_ => {
    if (null === updateBook) {
        return;
    }

    setBooks(bs => bs.map(b => b.id === updateBook.id 
        ? { ...b, ...updateBook, copy: {...b} } 
        : b));


    axios.put(URL + '/book/' + updateBook.id, updateBook)
    .then(res => {
        console.log(res.data)
    })
    .catch(error => {
        console.log(error)
        setBooks(bs => bs.map(b => b.id === updateBook.id ? b.copy : b));
    });
}, [updateBook]);

  return (
    <>
        <div className="container">
                <div className="row">
                    <div className="col-4">
                        <Create setStoreBook={setStoreBook}/>
                    </div>
                    <div className="col-8">
                        <List books={books} setDeleteBook={setDeleteBook} setEditBook={setEditBook}/>
                    </div>
                </div>
        </div>
        <Delete deleteBook={deleteBook} setDeleteBook={setDeleteBook} setDestroyBook={setDestroyBook} />
        <Edit editBook={editBook} setEditBook={setEditBook} setUpdateBook={setUpdateBook}/>
        <Messages messages={messages} closeMsg={closeMsg}/>
    </>
  )
}