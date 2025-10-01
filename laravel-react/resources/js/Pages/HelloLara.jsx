
import { Link } from '@inertiajs/react';

export default function HelloLara({ laraIs, auth, laraColors }) {

    return (
        <div className="p-6 m-4 rounded-md bg-slate-400/70  shadow-lg">
            {laraIs}
            <div className="mt-2 text-sm text-gray-900">
                {laraColors.map(color => (
                    <span key={color} className="mr-2" style={{ color }}>
                        {color}
                    </span>
                ))}
            </div>
            <div className="mt-2 text-sm text-yellow-900">
                <Link href={`/users/${auth.user.id}`}>
                    Lara and {auth.user.name}
                </Link>
            </div>
        </div>
    );
}
