// resources/js/ziggy.js

const Ziggy = {
    url: 'http://127.0.0.1:8000',
    port: null,
    routes: {
        home: {
            uri: '/',
            methods: [ 'GET', 'HEAD'],
            domain: null,
        },
        login: {
            uri: 'login',
            methods: ['GET', 'HEAD'],
            domain: null,
        },
    },
};

export { Ziggy };