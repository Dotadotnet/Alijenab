window.$crisp = [];
window.CRISP_WEBSITE_ID = "4358e404-c4d2-444d-a62a-bb40639ab93e";

let loaded = false;

function loadCrisp() {
    if (loaded) return;
    loaded = true;

    const s = document.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = true;

    document.head.appendChild(s);
}


setTimeout(() => {
    loadCrisp()
}, 1000)


let itemsShouldRemove = [
    'div[class*="first-of-group"][class*="last-of-group"][class*="operator"][class*="picker"]',
    'div > a[href*="crisp.chat/en/livechat"]',
    'div[class*="wait-reply"]',
    "span.cc-djbaw.cc-q39b9",
    'span[aria-label*="اقدامات سریع"]',
    'span.cc-k9dpy.cc-k9dpy--status-initial.cc-8im12'
]

window.addEventListener('load', () => {

    setInterval(() => {
        itemsShouldRemove.forEach(itemShouldRemove => {
            let selector = itemShouldRemove;
            let fatherEl = "";
            if (selector.includes(">")) {
                let toArray = selector.split(">")
                selector = toArray[1].trim();
                fatherEl = toArray[0].trim();
            }
            document.querySelectorAll(selector).forEach(el => {
                if (fatherEl) {
                    const parent = el.closest(fatherEl);
                    if (parent) parent.remove();
                } else {
                    el.remove();
                }
            });
        });
        let topInfo = document.querySelector('div[class*="activity-metrics"][class*="mode-chat"][class*="tile-eyes"]');
        if (topInfo) {
            topInfo.style.height = "60px";
            topInfo.style.setProperty("padding-top", "20px", "important");
        }
        let all_elements = document.querySelectorAll('div.cc-w7v18 *');
        all_elements.forEach(element => {
            element.style.cssText += 'font-family: sans !important';
        });


        const isDark = document.documentElement.classList.contains('dark');

        if (isDark) {
            $crisp.push(["config", "color:mode", ["dark"]]);
        } else {
            $crisp.push(["config", "color:mode", ["light"]]);
        }
    }, 500)


})


