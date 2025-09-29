import { useContext, useRef, useState } from "react";
import DataContext from "../../Contexts/DataContext";
import InputError from "../InputError";
import { basicValidator, hasErrors } from "../../Validators/basicValidator";

export default function Create() {

    const {setStoreBook} = useContext(DataContext);
    
    const [title, setTitle] = useState('');
    const [author, setAuthor] = useState('');
    const [published_year, setPublished_year] = useState('');

    const titleInputRef = useRef(null);
    const authorInputRef = useRef(null);
    const yearInputRef = useRef(null);

    const [errors, setErrors] = useState({});

    const handleTitle = e => {
        let error;
        setTitle(e.target.value);
        
        error = basicValidator('Title', e.target, 'max', 30);
        setErrors(prev => ({ ...prev, title: error }));

        
    }

    const handleAuthor = e => {
        setAuthor(e.target.value);
        let error;
        [
            { type: 'noDigits' }, 
            { type: 'max', param: 40 }
        ]
        .forEach(rule => {
            if (error) return;
            error = basicValidator('Author', e.target, rule.type, rule.param);
            setErrors(prev => ({ ...prev, author: error }));
        });
    }

    const handlePublished_year = e => {
        let error;
        setPublished_year(e.target.value);
        error = basicValidator('Year', e.target, 'onlyDigits');
        setErrors(prev => ({ ...prev, published_year: error }));
    }

    const handleSave = _ => {
       
        if (hasErrors({...errors})) {
            return;
        }

        let error = null;
        let rules;

        rules = [
            { type: 'required' },
            { type: 'min', param: 2 }
        ];
        for (const rule of rules) {
            error = basicValidator('Title', titleInputRef.current, rule.type, rule.param);
            setErrors(prev => {
                console.log('Title rule', rule, error, {...prev});
                return { ...prev, title: error };
            });
            if (error) break;
        }
        if (error) return;


         rules = [
            { type: 'required' }, 
            { type: 'min', param: 2 }
        ];
        for (const rule of rules) {
            error = basicValidator('Author', authorInputRef.current, rule.type, rule.param);
            setErrors(prev => {
                console.log('Author rule', rule, error, {...prev});
                return { ...prev, author: error };
            });
            if (error) break;
        }
        if (error) return;

        rules = [
            { type: 'required' },
            { type: 'year' }
        ];
        for (const rule of rules) {
            error = basicValidator('Year', yearInputRef.current, rule.type, rule.param);
            setErrors(prev => {
                console.log('Year rule', rule, error, {...prev});
                return { ...prev, published_year: error };
            });
            if (error) break;
        }
        if (error) return;

        setStoreBook({
            title,
            author,
            published_year
        });
        // reiktu perkelt kitur
        setTitle('');
        setAuthor('');
        setPublished_year('');
    }
    
    return (
        <div className="card mt-5">
            <div className="card-header">
                <h2>Create new Book</h2>
            </div>
            <div className="card-body">
                <p className="card-text">Fill form to add new book.</p>
                <div className="mb-3">
                    <label className="form-label">Title</label>
                    <InputError message={errors.title}/>
                    <input ref={titleInputRef} type="text" className="form-control" onChange={handleTitle} value={title} />
                </div>

                <div className="mb-3">
                    <label className="form-label">Author</label>
                    <InputError message={errors.author}/>
                    <input ref={authorInputRef} type="text" className="form-control" onChange={handleAuthor} value={author} />
                </div>

                <div className="mb-3">
                    <label className="form-label">Year</label>
                    <InputError message={errors.published_year}/>
                    <input ref={yearInputRef} type="text" className="form-control" onChange={handlePublished_year} value={published_year} />
                </div>
 
                <button type="button" disabled={hasErrors({...errors})} className="btn btn-outline-primary" onClick={handleSave}>Save</button>
            </div>
        </div>
    );
}

// kiekvienas imputas turi turet arba bendra state arba atskira state, nes bus kontroliuojami
