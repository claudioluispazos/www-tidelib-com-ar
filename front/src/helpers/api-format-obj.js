const snakeToCamelCase = (obj) => {
    const camelObj = {};

    for (let key in obj) {

        const camelKey = key.replace(/_([a-z])/g, function (match, p1) {
            return p1.toUpperCase();
        });

        camelObj[camelKey] = obj[key];

    }

    return camelObj;

}

const camelToSnakeCase = (obj) => {
    const snakeObj = {};

    for (let key in obj) {
        const snakeKey = key.replace(/[A-Z]/g, function (match) {
            return '_' + match.toLowerCase();
        });

        snakeObj[snakeKey] = obj[key];

    }

    return snakeObj;
}


function snakeToCamel(obj) {
    if (obj instanceof Array) {
        return obj.map(item => snakeToCamel(item));
    } else if (obj instanceof Object) {
        const camelObj = {};
        Object.keys(obj).forEach(key => {
            const camelKey = key.replace(/_([a-z])/g, (match, letter) => letter.toUpperCase());
            camelObj[camelKey] = snakeToCamel(obj[key]);
        });
        return camelObj;
    } else {
        return obj;
    }
}

function camelToSnake(obj) {
    if (obj instanceof Array) {
        return obj.map(item => camelToSnake(item));
    } else if (obj instanceof Object) {
        const snakeObj = {};
        Object.keys(obj).forEach(key => {
            const snakeKey = key.replace(/[A-Z]/g, match => `_${match.toLowerCase()}`);
            snakeObj[snakeKey] = camelToSnake(obj[key]);
        });
        return snakeObj;
    } else {
        return obj;
    }
}


export { camelToSnakeCase, snakeToCamelCase, snakeToCamel, camelToSnake }

