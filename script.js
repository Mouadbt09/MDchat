// ----------------password show/hide
function showPass(el){
    el.parentNode.childNodes[3].type="text"
    el.parentNode.childNodes[7].style.display="block"
    el.style.display="none"
}
function hidePass(el){
    el.parentNode.childNodes[3].type="password"
    el.parentNode.childNodes[5].style.display="block"
    el.style.display="none"
}

// ----------------form show/hide
function  show_sign_form(){
    document.querySelector('.login-form').style.display="none"
    document.querySelector('.sign-form').style.display="grid"
}
function  show_login_form(){
    document.querySelector('.login-form').style.display="grid"
    document.querySelector('.sign-form').style.display="none"
}

// ------------------ show  chat area select user
function f1(el){
    headerr=document.querySelector('.header')
    chat=document.querySelector('.chat_area')
    users=document.querySelector('.users')
    if(window.innerWidth<=591){
        headerr.style.display="flex"
        chat.style.display="block"
        users.style.display="none"
    }
    userId=el.childNodes[5].value
    let xhr=new XMLHttpRequest()
    xhr.open('POST',"php/getuser.php",true)
    xhr.onload=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
            let res=xhr.response
            document.querySelector('.header').innerHTML=res
            document.getElementById('rid').value=document.getElementsByClassName('rcid')[0].innerText
        }
    }
    xhr.setRequestHeader('content-type',"application/x-www-form-urlencoded")
    xhr.send("userid="+userId)
}
// ------------------ hide chat area
function f2(){
    headerr=document.querySelector('.header')
    chat=document.querySelector('.chat_area')
    users=document.querySelector('.users')
    if(window.innerWidth<=591){
        headerr.style.display="none"
        chat.style.display="none"
        users.style.display="block"
    }
    
}

// -----------------------search
function searchh(){
    key=document.getElementById('search').value
    let xhr=new XMLHttpRequest()
    xhr.open('POST',"php/search.php",true)
    xhr.onload=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
            let res=xhr.response
            document.querySelector('.allusers').innerHTML=res
        }
    }
    xhr.setRequestHeader('content-type',"application/x-www-form-urlencoded")
    xhr.send("s="+search.value)
}

formdata=document.querySelector('#formm')
//--------------------------- send messages
function sendmessage(){
    message=document.getElementById('msg')
    let xhr=new XMLHttpRequest()
        xhr.open('POST',"php/sendmessage.php",true)
        xhr.onload=function(){
            if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
                let res=xhr.response
                if(res==1){
                    message.value=""
                }
                else{
                    alert('somthing went wrong')
                }
            }
        }
        let fdata=new FormData(formdata)
        fdata.append('msg', message.value);
        console.log(fdata)
        xhr.send(fdata)
}

//------------------------- get messages
setInterval(()=>{
    let xhr=new XMLHttpRequest()
    xhr.open('POST',"php/get_massages.php",true)
    xhr.onload=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
            let res=xhr.response
            if(res==0){
                document.querySelector('.main_chat').innerHTML="<p>No messages here yet...</p>"
                document.querySelector('.main_chat').classList.add('chat_area_empty')
            }else{
                document.querySelector('.main_chat').innerHTML=res
                if(!document.querySelector('.main_chat').classList.contains("active")){
                    document.querySelector('.main_chat').scrollTop=document.querySelector('.main_chat').scrollHeight
                }
                document.querySelector('.main_chat').classList.remove('chat_area_empty')
            }
                
        }
    }
    let fdata=new FormData(formdata)
    xhr.send(fdata)

},500)

//------------------------- get all usres
setInterval(()=>{
    let xhr=new XMLHttpRequest()
    xhr.open('GET',"php/getAllUsres.php",true)
    xhr.onload=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
            let res=xhr.response
            console.log(res)
             document.querySelector('.allusers').innerHTML=res   
        }
    }
    xhr.send()

},500)
