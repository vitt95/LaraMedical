/**
 * Date formatter
 */

import axios from 'axios';

const API_URL = `${document.location.origin}/api`;

const getToday = (separator = '-', format = 'YYYY-mm-dd') => {
    const date = new Date(Date.now());
    let today;
    if(format == 'YYYY-mm-dd'){
        today = `${date.getFullYear()}${separator}${date.getMonth() + 1}${separator}${date.getDate()}`;
    }

    switch(format){
        case 'YYYY-mm-dd':
            today = `${date.getFullYear()}${separator}${date.getMonth() + 1}${separator}${date.getDate()}`;
        break;

        case 'dd-mm-YYYY':
            today = `${date.getDate()}${separator}${date.getMonth() + 1}${separator}${date.getFullYear()}`;
        break;
    }

    return today;
}


const getAvailableDayForService = () => {
    return new Promise( async (resolve, reject) => {
        const today = getToday();

        let response = await axios.get(`${API_URL}/reservation/available/${today}`);
        if(response.status == 200){
            resolve(response.data);
        }else reject(response);

    });
}

export{
    getAvailableDayForService
}
