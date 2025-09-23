import './App.scss';
import { DataProvider } from './Contexts/DataContext';
import Index from './Components/Books';

function App() {
  

  return (
      <DataProvider>
          <Index />
      </DataProvider>    
  )
}

export default App
