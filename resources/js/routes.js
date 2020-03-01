import Courses from './views/Courses'
import Settings from './views/Settings'
import Planner from './views/Planner'
import Chat from './views/Chat'
import Dashboard from './views/Dashboard'
import CreateSession from './views/Session/CreateSession'
import CreateSessionFirst from './views/Session/CreateSessionFirst'
import NotFound from './views/404'

export default {
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFound,
        },
        {
            path: '/',
            component: Dashboard,
        },
        {
            path: '/courses',
            component: Courses
        },
        {
            path: '/planner',
            component: Planner
        },
        {
            path: '/chat',
            component: Chat
        },
        {
            path: '/settings',
            component: Settings
        },
        {
            path: '/create-session',
            component: CreateSession
        },
        {
            path: '/create-session/step-one',
            component: CreateSessionFirst
        },
    ]
};
