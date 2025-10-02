
import { Link } from '@inertiajs/react';
import Main from '@/Layouts/Main';
import MainGuest from '@/Layouts/MainGuest';

export default function HelloLara({ laraIs, auth, laraColors, labas }) {

return (
    <>
    <Main auth={auth}>
        <div className="p-6 m-4 rounded-md bg-slate-400/70  shadow-lg">
            {laraIs}
            <div>
                {labas}
            </div>
            <div className="mt-2 text-sm text-gray-900">
                {laraColors.map(color => (
                    <span key={color} className="mr-2" style={{ color }}>
                        {color}
                    </span>
                ))}
            </div>
        </div>
        <div className="pl-6  text-sm bg-slate-600 text-yellow-400">
            <Link href={route('briedis')}>Go to briedis</Link>
        </div>
    </Main>
    <MainGuest auth={auth}>
        <div className="p-6 m-4 rounded-md bg-slate-400/70  shadow-lg">
            {laraIs}
        </div>
        
        <div className="pl-6 border border-collapse border-red-400 text-sm bg-slate-600 text-yellow-400">
            <Link href={route('briedis')}>Go to briedis</Link>
        </div>
    </MainGuest>
    </>
    );
}
