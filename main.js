async function generateNumber() {
    let res = await fetch('http://randomapi/generation');
    let num_data = await res.json();
    if (num_data.status === true) {
        document.getElementById('gen-id').value = num_data.num_id;
        document.getElementById('gen-number').value = num_data.number;
    }
}

async function retrieveNumber(id) {
    let res = await fetch(`http://randomapi/retrieve/${id}`);
    let num_data = await res.json();
    document.getElementById('output-id').value = '';
    document.getElementById('time').value = '';
    if (typeof num_data['number'] !== "undefined") {
        document.getElementById('output-id').value = num_data.number;
        document.getElementById('time').value = num_data.generation_time;
    }
}