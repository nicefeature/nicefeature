import { Config } from 'ziggy-js';
import { Board } from './board';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
    board: Board;
    boards: Board[]; // only public boards
    allBoards: Board[];
};
