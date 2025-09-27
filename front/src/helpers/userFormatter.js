export function objectToString(objectToStringify) {
    try {
        const entries = Object.entries(objectToStringify);

        const keyValueStrings = entries.map(([key, value]) => {
            if (Array.isArray(value)) {
                return `${key}: ${value.join(', ')}`;
            } else if (typeof value === 'object' && value !== null) {
                return `${key}: { ${objectToString(value)} }`;
            } else {
                return `${key}: ${value}`;
            }
        });

        return keyValueStrings.join(', ');
    } catch (error) {
        console.error('Error al convertir el objeto a cadena:', error);
        return null;
    }
};

export function convertToString(data) {
    if (Array.isArray(data)) {
        return data.map(objectToString).join(', ');
    } else if (typeof data === 'object' && data !== null) {
        return objectToString(data);
    } else {
        return String(data);
    }
}