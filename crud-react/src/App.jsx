import Create from './Components/Create';
import List from './Components/List';
import axios from 'axios';
import './index.scss';
import { useEffect, useState } from 'react';

export default function App() {

  const URL = 'http://localhost/bit_projects/crud-laravel/public/api';

  const [books, setBooks] = useState(null);


  useEffect(_ => {
    axios.get(URL + '/books')
    .then(res => {
        setBooks(res.data)
    })
    .catch(error => {
        console.log(error)
    });
}, []);

  return (
    <>
        <div className="container">
                <div className="row">
                    <div className="col-4">
                        <Create/>
                    </div>
                    <div className="col-8">
                        <List books={books}/>
                    </div>
                </div>
        </div>
    </>
  )
}