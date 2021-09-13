window.Collapse = (o) => {
    let el = o
    let active = false

    let addStyling = function(){
        if(document.querySelectorAll('[data-name="collapse-styling"]').length > 0){
            console.log('style already found in page')
            return;
        }

        let css = `
            [data-type="collapse"] [data-name="collapse-btn"] {
                cursor: pointer;
                position: relative;
            }
            [data-name="collapse-btn"]::after {
                content: '\\25be';
                float:left;
                margin-left:10px;
            }
            [data-name="collapse-btn"].active::after {
                content: '\\25b4';
            }
            [data-type="collapse"] [data-name="collapse-content"] {
                overflow: hidden;
                max-height: 0;
                transition: max-height 1s ease-in-out;
            }
        `
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style')
        style.setAttribute('data-name', 'collapse-styling')
        head.appendChild(style)
        
        style.type = 'text/css'
        if (style.styleSheet){
            // This is required for IE8 and below.
            style.styleSheet.cssText = css
        } else {
            style.appendChild(document.createTextNode(css))
        }
    }

    this.init = function() {
        let btnName = o.getAttribute('data-button')
        let contentName = o.getAttribute('data-target')
        let btn = o.querySelector(`[data-name="${btnName}"]`)
        let content = o.querySelector(`[data-name="${contentName}"]`)

        // btn.style.cursor = "pointer"
        // content.style.maxHeight = 0
        // content.classList.add('overflow-hidden')

        addStyling()

        btn.addEventListener('click', () => {
            console.log(active)
            if(active) {
                content.style.maxHeight = 0
                active = !active
                btn.classList.remove('active')
            } else {
                content.style.maxHeight = content.scrollHeight + 'px'
                active = !active
                btn.classList.add('active')
            }
        })

    }

    this.init();

}

window.CollapseInit = function() {
    document.querySelectorAll('[data-type="collapse"]').forEach(col => {
        Collapse(col);
    });
}

CollapseInit();