import { Link } from '@inertiajs/react';
import Main from '@/Layouts/Main';
import MainGuest from '@/Layouts/MainGuest';

export default function HelloLara({ laraIs, auth, laraColors, labas }) {

    return (
        <>
            <Main auth={auth}>
                <div className="p-6 bg-white border-b border-gray-200">
                    {laraIs}
                    <div className="mt-2 text-sm text-gray-500">
                        {labas}
                    </div>
                    <div className="mt-2 text-sm text-gray-500">
                        {laraColors.map(color => (
                            <span key={color} className="mr-2" style={{ color }}>
                                {color}
                            </span>
                        ))}
                    </div>
                </div>

                <div className="mt-2 text-sm text-gray-500">
                    <Link href={route('briedis')}>Go to Briedis</Link>
                </div>
            </Main>
            <MainGuest auth={auth}>
                <div className="p-6 bg-white border-b border-gray-200">
                    {laraIs}
                </div>

                <div className="mt-2 text-sm text-gray-500">
                    <Link href={route('briedis')}>Go to Briedis</Link>
                </div>
            </MainGuest>
        </>
    );
}