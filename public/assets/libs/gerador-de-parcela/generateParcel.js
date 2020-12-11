/**
 * Check if date is possible
 * 
 * Example: 
 * 30/02/2020 // not possible
 * 20/02/2020 // is possible   
 *    
 *       
 * @param int day
 * @param int month
 * @param int year
 * @return string
 */
function isPossibleDate(day, month, year) {

    let date = new Date(year, month, 0);
    let numberDay = date.getDate();

    if (day > numberDay) {
        day = day - numberDay;
        month += 1;
    }

    if (month > 12) {
        month = 1
        year += 1
    }


    return day + "/" + month + "/" + year;
}
// Example:
//console.log(isPossibleDate((30+5), 12, 2020));
//output: 4/1/2021


/**
 * Generate of Date
 *
 * @param int day
 * @param int month
 * @param int year
 * @param int looping
 * @return array
 */
function generateDate(day, month, year, looping) {
    let arrDate = [];

    for (i = looping; i > 0 && i <= looping; i -= 1) {
        month++
        if (month > 12) {
            month = 1
            year += 1
        }

        arrDate.push(isPossibleDate(day, month, year))
    }
    return arrDate
}
// Example:
//console.log(generateDate(30, 12, 2020, 2));
//output: Array [ "30/1/2021", "2/3/2021"]


/**
 * Generate of parcel
 *
 * @param array arrDate
 * @param string valueParcel
 * @return array
 */
function generateParcel(arrDate, valueParcel) {
    let parcel = []
    for (let i = 0; i < arrDate.length; i++) {
        parcel.push({
            'indice': i,
            'valor': valueParcel,
            'data': arrDate[i],
            'status': 'Em aberto'
        })
    }
    return parcel
}
// Example:
// let arrDate = generateDate(30, 12, 2020, 1)
// let parcel  = generateParcel(arrDate, "20,59");
// output: Array [ Object { indice: 0, data: "20,59", data: "30/1/2021", status: "Em aberto" } ]