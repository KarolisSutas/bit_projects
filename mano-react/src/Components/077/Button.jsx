import { useContext} from 'react';
import ColorsContext from '../../Contexts/ColorsContext';


export default function Button() {

    const {changeColor} = useContext(ColorsContext);

    return (
            <button className="yellow" onClick={changeColor}>Change color</button>
    );
}

