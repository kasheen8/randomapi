
async function generateNumber() {
    let res = await fetch('http://randomapi/generation');
    let posts = await res.json();


}