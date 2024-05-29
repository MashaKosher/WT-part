let info = {
    "form1":["Мясная",[18.99, 24.99, 36 ]],
    "form2":["Баварская",[16.99, 22.99, 34 ]],
    "form3":["Жульен",[18.99, 24.99, 36 ]],
    "form4":["Карбоанра",[16.99, 22.99, 32 ]],
    "form5":["Пепперони",[10.99, 20.99, 28 ]],
    "form6":["Маргарита",[10.99, 20.99, 28 ]],
    "form7":["Сырная",[10.99, 20.99, 28 ]],
    "form8":["Диабло",[18.99, 24.99, 36 ]],
    "form9":["Песто",[18.99, 24.99, 36 ]],
} 



for(let i = 1; i<10; i++){
    let $form = document.getElementById(`form${i}`)
    $form.onsubmit = add
}


const $bill = document.getElementById("bill")
const $order_header = document.getElementById("order_header")

const $order_form = document.getElementById("order-form")

order_position = 0
sum = 0

const $but1 = document.getElementById("but1")
$but1.onclick = delete_order_tips





function add(e){
    console.log("FIrst")
    e.preventDefault()
    const id = e.target.id
    const $formelem = document.getElementById(id)
    count = Number($formelem.elements[0].value)
    $formelem.elements[0].value = ''
    size = [$formelem.elements[1].checked, $formelem.elements[2].checked, $formelem.elements[3].checked].indexOf(true)
    $formelem.elements[size+1].checked = false

    
    
    const $position = document.getElementById(`order${order_position-1}`)

    price = Number(info[id][1][size]*count).toFixed(2)
    nameInput = info[id][0] + ';' + count +  ';' + price


    if(price > 0 ){
        sum += info[id][1][size]*count
        temp = Number(sum).toFixed(2)
        if($position){
            $position.insertAdjacentHTML("afterend",`<div id='order${order_position}'><input id='orderinput${order_position}' checked='true'  name = '${nameInput}' value='4' type="checkbox"><span>Пицца ${info[id][0]} x${count} = ${price}</span></div>`)
    
            
        }else{
    
            $order_header.insertAdjacentHTML("afterend",`<div id='order${order_position}'><input id='orderinput${order_position}' checked='true'  name = '${nameInput}' value='4' type="checkbox"><span>Пицца ${info[id][0]} x${count} = ${price}</span></div>`)
    
        }
        order_position++
        
        $bill.innerHTML = `Расчетная цена: ${temp} рублей `
    }

    
    return false
}



function delete_order_tips(e){

    arr = []

    for(i in $order_form.elements){
        temp = Number(i)
        if(temp>=0){
            arr.push(temp)

        }else{
            break
        }
    }

    new_arr = []
    for(i = 0; i < arr.length; i++ ){
        if(!$order_form.elements[i].checked){
            input_id = $order_form.elements[i].id
            console.log(input_id, input_id.includes("orderinput"))
            if(input_id.includes("orderinput")){
                console.log(input_id)
                div_id = input_id.replace("input", '')
                $div = document.getElementById(div_id)
                $temp = $div.lastChild.innerHTML.split(' ')
                $temp = $temp[$temp.length-1]
                sum -= Number($temp)
                temp = Number(sum).toFixed(2)
                if(temp < 0){
                        sum=0
                }
                $bill.innerHTML = `Расчетная цена: ${temp} рублей `
                $div.remove()
            }
        }
    }
}

