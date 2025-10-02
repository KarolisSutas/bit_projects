
import { Link } from '@inertiajs/react';
import Main from '@/Layouts/Main';
import MainGuest from '@/Layouts/MainGuest';


export default function Briedis({ kasTu, laraUrl, labas, auth }) {

    return (
        <>
        <Main auth={auth}>
        <div className="p-6 m-4 rounded-md bg-slate-400/70  shadow-lg">
            {kasTu}
            <div className="mt-2 text-sm text-gray-500">
                    {labas}
            </div>
        </div>

        <div className="pl-6 text-sm bg-slate-600 text-yellow-400">
            <Link href={laraUrl}>Go to lara</Link>
        </div>
        </Main>
        <MainGuest auth={auth}>
              <div className="p-6 m-4 rounded-md bg-slate-400/70  shadow-lg">
                  {kasTu}
              </div>
      
              <div className="pl-6 border border-collapse border-red-400 text-sm bg-slate-600 text-yellow-400">
                  <Link href={laraUrl}>Go to lara</Link>
              </div>
        </MainGuest>
              </>
    );
}
