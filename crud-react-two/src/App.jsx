import './App.scss';
import { DataProvider } from './Contexts/DataContext';
import BookIndex from './Components/Books/index';
import AuthorsIndex from './Components/Authors/index';
import AboutIndex from './Components/About/index';
import { MsgProvider } from './Contexts/MsgContext';
import Messages from './Components/Messages';
import Nav from './Components/Nav';
import { BrowserRouter, Routes, Route } from "react-router";


function App() {
  

  return (
  
    <BrowserRouter>
      <MsgProvider>
          <DataProvider>
            <Nav />
            <Routes>
              <Route path="/" element={<AboutIndex />} />
              <Route path="/books" element={<BookIndex />} />
              <Route path="/authors" element={<AuthorsIndex />} />
            </Routes>
        </DataProvider> 
        <Messages />
      </MsgProvider> 
    </BrowserRouter> 
  );
}

export default App
