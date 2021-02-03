var preview = document.getElementById('preview');


preview.addEventListener('click',()=>{
    

    if(!document.getElementById('previewWindow') && checkInput()){
        var name = document.getElementById('name').value
        var email = document.getElementById('email').value
        var content = document.getElementById('content').value

        var wrap = document.createElement('div')
        var namewrap = document.createElement('h3')
        namewrap.innerText = name;
        wrap.appendChild(namewrap);

        var contentwrap = document.createElement('p')
        contentwrap.innerText = content;
        wrap.appendChild(contentwrap);

        var hr = document.createElement('hr')
        wrap.appendChild(hr);

        var emailtwrap = document.createElement('blockquote')
        emailtwrap.innerText = email;
        wrap.appendChild(emailtwrap);

        var close = document.createElement('button');
        

        close.innerText = 'close';
        close.addEventListener('click', ()=>{
            var window = document.getElementById('previewWindow')
            window.parentNode.removeChild(window);
        })
        wrap.appendChild(close)
        close.className = 'btn btn-danger'

        document.getElementById('body').appendChild(wrap);


        wrap.style.position = 'fixed';
        wrap.style.left = 100 + 'px';
        wrap.style.top = 400 + 'px';
        wrap.style.background = '#DCE4E6'
        wrap.style.padding = '1rem';
        wrap.style.border = '2px solid #000000'
        wrap.style.borderRadius = '5px'
        wrap.id = 'previewWindow'
        wrap.style.maxWidth = '90%'
    }
    else{
        alert("Заполните все поля!")
    }

    function checkInput(){
        var name = document.getElementById('name').value
        var email = document.getElementById('email').value
        var content = document.getElementById('content').value

        return (name && email && content);
    }
    
})