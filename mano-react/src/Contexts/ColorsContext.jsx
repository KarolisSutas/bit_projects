import { createContext} from 'react';
import useColor from '../Hooks/useColor';


const ColorsContext = createContext();


export const Colors = ({children}) => {


    const [color, changeColor] = useColor('#3f7428');

    return (
        <ColorsContext.Provider value={{
            color,
            changeColor,
        }}>
            {children}
        </ColorsContext.Provider>
    );

}

export default ColorsContext;