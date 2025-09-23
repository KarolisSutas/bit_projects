import * as C from '../Constants/booksTypes';


export default function booksReducer(state, action) {
    let stateCopy = state === null ? null : structuredClone(state);


    switch(action.type) {
        case C.GET_BOOKS_FROM_SERVER:
            stateCopy = action.payload
            break;
        case C.MARK_BOOK_TO_DELETE:
            stateCopy = state.map(b => action.payload === b.id ? { ...b, delete: true } : b);
            break;
        case C.REOMVE_DELETED_BOOK:
            stateCopy = state.filter(b =>  b.id !== action.payload.id);
            break;
        case C.RESTORE_MARKED_BOOK:
            stateCopy = state.map(b => action.payload === b.id ? { ...b, delete: false } : b);
            break;

        default: 
    }

    return stateCopy;

}