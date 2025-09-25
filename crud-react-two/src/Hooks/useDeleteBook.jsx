import { useState, useEffect } from 'react';
import * as SETTINGS from '../Constants/settings';
import * as A from '../Actions/books';
import axios from 'axios';


export default function useDeleteBook(dispatchBooks, msg) {


      const [deleteBook, setDeleteBook] = useState(null);
      const [destroyBook, setDestroyBook] = useState(null);

      useEffect(_ => {
        if (null === destroyBook) {
            return;
        }
    
        dispatchBooks(A.markToDelete(destroyBook.id)); // optimistinis atnaujinimas
        const msgId = msg({
            title: 'Deleting...',
            text: 'Your book is about to be deleted.',
            type: 'info',
        });
    
        axios.delete(SETTINGS.URL + 'book/' + destroyBook.id)
            .then(res => {
                console.log(res.data);
                dispatchBooks(A.Delete(destroyBook.id));
                msg({
                    title: 'Deleted', 
                    text: 'Your book was deleted.', 
                    type: 'success'
                }, msgId);
            })
            .catch(error => {
                console.log(error);
                dispatchBooks(A.RestoreDeleted(destroyBook.id));
                msg({
                    title: 'Deleting Failed', 
                    text: 'Your book was not deleted.', 
                    type: 'danger'
                }, msgId);
            });
    
    }, [destroyBook, msg]);


    return {deleteBook, setDeleteBook, destroyBook, setDestroyBook}

}