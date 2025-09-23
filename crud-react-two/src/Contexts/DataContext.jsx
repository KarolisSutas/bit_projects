import { createContext } from "react";
import useBooks from "../Hooks/useBooks";
import useDeleteBook from "../Hooks/useDeleteBook";

const DataContext = createContext();


export const DataProvider = ({children}) => {

    const [books, dispatchBooks] = useBooks();

    const {deleteBook, setDeleteBook, destroyBook, setDestroyBook} = useDeleteBook(dispatchBooks);



    return (
        <DataContext.Provider value={{
            books, dispatchBooks,
            deleteBook, setDeleteBook, destroyBook, setDestroyBook
        }}>
            {children}
        </DataContext.Provider>
    );
}


export default DataContext;
