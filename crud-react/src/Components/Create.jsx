export default function Create() {
    
    
    return (
        <div className="card mt-5">
            <div className="card-header">
                <h2>Create new Book</h2>
            </div>
            <div className="card-body">
                <p className="card-text">Fill form to add new book.</p>
                <div className="mb-3">
                    <label className="form-label">Title</label>
                    <input type="text" className="form-control" />
                </div>
                <div className="mb-3">
                    <label className="form-label">Author</label>
                    <input type="text" className="form-control" />
                </div>
                <div className="mb-3">
                    <label className="form-label">Year</label>
                    <input type="text" className="form-control" />
                </div>
 
                <button type="button" className="btn btn-outline-primary">Save</button>
            </div>
        </div>
    );
}
