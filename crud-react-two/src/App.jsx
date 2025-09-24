import './App.scss';
import { DataProvider } from './Contexts/DataContext';
import Index from './Components/Books/index';
import { MsgProvider } from './Contexts/MsgContext';
import Messages from './Components/Messages';

function App() {
  

  return (
    <MsgProvider>
        <DataProvider>
            <Index />
        </DataProvider> 
        <Messages />
    </MsgProvider>   
  );
}

export default App
