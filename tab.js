//タブ機能
const tabs = document.querySelectorAll(".tabs li a");
const contents = document.querySelectorAll(".contents li");

console.log(tabs);
console.log(contents);

for(let i = 0; i < tabs.length; i++){
    tabs[i].addEventListener("click",function(e){
        e.preventDefault();

        for(let j = 0; j < tabs.length; j++){
            localStorage.setItem("tab1",tabs[j]);
            let tab1 = localStorage.getItem("tab1");
            tab1.classList.remove("active");
        }

        for(let j = 0; j < contents.length; j++){
            localStorage.setItem("contents1",contents[j]);
            let content1 = localStorage.getItem("contents1");
            content1.classList.remove("active");
       }

       localStorage.setItem("tab2",tabs[i]);
       let tab2 = localStorage.getItem("tab2");
       tab2.classList.add("active");

       localStorage.setItem("contents2",contents[i]);
       let content2 = localStorage.getItem("contents2");
       content2.classList.add("active");

    });
}