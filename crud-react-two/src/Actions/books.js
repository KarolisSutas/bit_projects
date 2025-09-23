import * as C from '../Constants/booksTypes';

export const getBooks = books => {

    return {
        type: C.GET_BOOKS_FROM_SERVER,
        payload: books
    }
}

export const markToDelete = id => {

    return {
        type: C.MARK_BOOK_TO_DELETE,
        payload: id
    }
}

export const Delete = id => {

    return {
        type: C.REOMVE_DELETED_BOOK,
        payload: id
    }
}

export const RestoreDeleted = id => {

    return {
        type: C.RESTORE_MARKED_BOOK,
        payload: id
    }
}