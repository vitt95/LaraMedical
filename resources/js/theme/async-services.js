/**
 * Async services repository
 */

const API_COUNTRY_URL = 'https://comuni-ita.herokuapp.com/api'

import axios from "axios";


/**
 * Retrieve all Italian Countries
 * @returns {Promise<Any>}
 */
const getItalianCountries = function(){
    return new Promise(async(resolve, reject) => {
        const response = await axios.get(`${API_COUNTRY_URL}/regioni`);
        if(response.status == 200){
            resolve(response);
        }else reject(response);
    });
}

/**
 * Retrieve all provinces relative to given country
 * @param {string} country
 * @returns {Promise<Any>}
 */
const getItalianProvinces = function(country){
    return new Promise(async (resolve, reject) => {
        let provinces = [];
        const response = await axios.get(`${API_COUNTRY_URL}/province/${country}`);
        if(response.status == 200){
            (response.data).map(resp => {
                provinces.push(resp.nome);
            })
            resolve(provinces);
        }else reject(response);
    });
}

/**
 * Retrieve all cities relative to given province
 * @param {string} province
 * @returns {Promise<Any>}
 */
const getItalianCities = function(province){
    return new Promise(async (resolve, reject) => {
        let cities = [];
        const response = await axios.get(`${API_COUNTRY_URL}/comuni/provincia/${province}`);
        if(response.status == 200){
            (response.data).map(resp => {
                cities.push({cap: resp.cap, nome: resp.nome});
            })
            resolve(cities);
        } else reject(response);
    });
}

export{
    getItalianCountries,
    getItalianProvinces,
    getItalianCities
}
