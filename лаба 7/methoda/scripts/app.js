const $add_button = document.getElementById('add_button')
$add_button.onclick = add_field

const $delete_button = document.getElementById('delete_button')
$delete_button.onclick = delete_button



let counter = 0
const $header = document.getElementById("text")

function add_field(){

    const $sender = document.getElementById(`reciever${counter-1}`)
    if ($sender){
        $sender.insertAdjacentHTML("afterend",`<div id='reciever${counter}'><input name = 'reciever${counter}' placeholder = 'Получатель ${counter}'></div>`)

    }else{
        $header.insertAdjacentHTML("afterend",`<div id='reciever${counter}' ><input name = 'reciever${counter}' placeholder = 'Получатель ${counter}'></div>`)

    }
    counter++
}

function delete_button(){
    const $sender = document.getElementById(`reciever${counter-1}`)
    if($sender){
        $sender.remove()
        counter--
    }
}