({694:function(){var e=this;window.Collapse=function(t){var a=!1;e.init=function(){var e=t.getAttribute("data-button"),n=t.getAttribute("data-target"),l=t.querySelector('[data-name="'.concat(e,'"]')),o=t.querySelector('[data-name="'.concat(n,'"]'));!function(){if(document.querySelectorAll('[data-name="collapse-styling"]').length>0)console.log("style already found in page");else{var e='\n            [data-type="collapse"] [data-name="collapse-btn"] {\n                cursor: pointer;\n                position: relative;\n            }\n            [data-name="collapse-btn"]::after {\n                content: \'\\25be\';\n                float:left;\n                margin-left:10px;\n            }\n            [data-name="collapse-btn"].active::after {\n                content: \'\\25b4\';\n            }\n            [data-type="collapse"] [data-name="collapse-content"] {\n                overflow: hidden;\n                max-height: 0;\n                transition: max-height 1s ease-in-out;\n            }\n        ';head=document.head||document.getElementsByTagName("head")[0],style=document.createElement("style"),style.setAttribute("data-name","collapse-styling"),head.appendChild(style),style.type="text/css",style.styleSheet?style.styleSheet.cssText=e:style.appendChild(document.createTextNode(e))}}(),l.addEventListener("click",(function(){console.log(a),a?(o.style.maxHeight=0,a=!a,l.classList.remove("active")):(o.style.maxHeight=o.scrollHeight+"px",a=!a,l.classList.add("active"))}))},e.init()},window.CollapseInit=function(){document.querySelectorAll('[data-type="collapse"]').forEach((function(e){Collapse(e)}))},CollapseInit()}})[694]();