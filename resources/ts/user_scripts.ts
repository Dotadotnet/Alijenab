


var host = window.location.protocol + "//" + window.location.host;
var current_url = window.location.href;
var name_business = 'کافه عالیجناب';
if (current_url.split('?')) {
    current_url = current_url.split('?')[0]
} else if (current_url.split('#')) {
    current_url = current_url.split('#')[0]
}
if (!localStorage.getItem('carts_data')) {
    localStorage.setItem('carts_data', JSON.stringify([]))
}

const iconsSvg: NodeListOf<HTMLImageElement> = document.querySelectorAll('[data-icon]');
iconsSvg.forEach(iconSvg => {
    let icon_name = iconSvg.dataset.icon;
    let url = `/media/img/custom/svg/Bulk/${icon_name}.svg`
    iconSvg.style.backgroundImage = `url('${url}')`;
});


function format_item_bar_product(data: { id: string, price: number, url: string, off: null | string, img: string | Array<string>, name: string }): string {
    let image = typeof (data.img) == 'string' ? data.img : data.img[0];
    let image_2 = typeof (data.img) == 'string' ? null : data.img;
    return `
       <div class="flex cart-shoping animate__animated animate__zoomIn relative w-full sm:w-96 group bg-gray-100 dark:bg-gray-900 p-2 rounded-2xl  "  data-id="${data.id}" id="${data.id}" >
                        <div class=" relative" >
                        <div class="absolute z-10 right-0 bottom-0  size-full flex justify-center items-end" >
                                   <div class="w-full p-2 scale-[1.1]">
                                          <button data-id="${data.id}"
                                                class="group  border border-white/20 hover:bg-white/30 mt-3 add-to-cart  bg-white/10 backdrop-blur-sm text-xl w-full  h-8 flex justify-center items-center text-white hover:font-bold  group rounded-full ">
                                                <i class="fa hover:font-bold fa-cart-plus" aria-hidden="true"></i>
                                            </button>
                                            <div data-id="${data.id}" id="${data.id}"
                                                class="group flex  w-full   box-card-control border border-white/20   bg-white/10 backdrop-blur-sm
          text-sm  h-8 px-1 flex justify-between  items-center text-white hover:font-bold  group rounded-full ">
                                                <button
                                                    class="
                                                    bg-white/10 backdrop-blur-sm          hover:bg-white/20
          rounded-full   cursor-pointer text-gray-600 group hover:text-white dark:text-gray-100 d flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 plus">

                                                    <svg class="group-hover:text-white text-gray-100 size-4"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </button>
                                                <span class="number select-none font-bold px-1 text-white ">
                                                     1
                                                </span>
                                       <button
                                                    class="
                                                    bg-white/10 backdrop-blur-sm hover:text-white         hover:bg-white/20
          rounded-full   cursor-pointer text-gray-100 group flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 nega">
                                                    <svg class="group-hover:text-white text-gray-100 size-4"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                        </div>
                        <div class="w-28 h-28 overflow-hidden rounded-2xl" >
                        <img class="size-full select-none group-hover:scale-105  object-cover rounded-2xl " src="${'/storage/' + data.thumbnail}" alt="">
                        </div>
                </div>
                <div style="width: calc(100% - 88px)" class="flex py-2 flex-col relative justify-around pr-5" >
                  <p class="text flex justify-between items-center">
                     <a  href="${'/product/' + data.id}" class="text-lg sm:text-xl select-none font-bold">${data.name}</a>
                   <a href="${'/product/' + data.id}" rel="nofollow"
                class="dark:text-gray-100 pl-2 group text-sm dark:hover:text-primary-200 hover:text-primary-200 text-gray-600 flex items-center gap-2  transition">
                ${data.off ?
            `<span>  %${ data.off } تخفیف </span>`
            :
            "<span> مشاهده </span> "
        }
                <i class="fa fa-arrow-left group-hover:-translate-x-1" aria-hidden="true"></i>
            </a>
                  </p>
                
                  <p class="text text-sm  ">
                    <div class="flex justify-between  items-center">
                    <div class="w-full flex flex-wrap  items-center " >
                      <span class=" select-none   flex-nowrap text-xs opacity-50 scale-75 line-through sm:text-sm text-nowrap text">
                    ${price(data.price)}   
                    </span> 
                    <span class=" select-none  flex-nowrap text-sm sm:text-base text-nowrap text">
                    ${price(data.off ? data.price - (data.price / 100) * parseInt(data.off) : data.price)}   
                    </span> 
                  
                    </div>
              
                        </div>

                        </div>
                  </p>

                </div>
          </div>
`;
}


const animateCSS = (element: any, animation: string, prefix = 'animate__') =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`;

        let node_element: HTMLElement | null = null;
        if (typeof element == 'string') {
            let get_element: HTMLElement | null = document.querySelector(element)
            if (get_element) {
                node_element = get_element;
            }
        } else {
            node_element = element;
        }
        if (node_element) {
            node_element.classList.add(`${prefix}animated`, animationName);

            // When the animation ends, we clean the classes and resolve the Promise
            function handleAnimationEnd(event: Event) {
                event.stopPropagation();
                if (node_element)
                    node_element.classList.remove(`${prefix}animated`, animationName);
                resolve('Animation ended');
            }
            node_element.addEventListener('animationend', handleAnimationEnd, { once: true });
        }
    });
const button_dark_mode: HTMLElement | null = document.querySelector('div.button-dark-mode');
const logos_website: NodeListOf<HTMLImageElement> = document.querySelectorAll('img.logo');
if (button_dark_mode && logos_website) {
    button_dark_mode.addEventListener('click', () => {
        animateCSS(button_dark_mode, 'headShake');
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('color-theme', 'light')
            logos_website.forEach((logo_website) => {
                logo_website.src = logo_website.src.replace('dark', 'light')
            })
        } else {
            localStorage.setItem('color-theme', 'dark')
            logos_website.forEach((logo_website) => {
                logo_website.src = logo_website.src.replace('light', 'dark')
            })
        }
        document.documentElement.classList.toggle('dark')
    })
}

if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    if (logos_website) {
        logos_website.forEach((logo_website) => {

            logo_website.src = logo_website.src.replace('light', 'dark')
        })
    }
} else {
    document.documentElement.classList.remove('dark')
    if (logos_website) {
        logos_website.forEach((logo_website) => {
            logo_website.src = logo_website.src.replace('dark', 'light')
        })
    }
}

const DURATION: { SHORT: number; LONG: number } = {
    SHORT: 2000,
    LONG: 4000
};

interface SnackbarAction {
    text: string;
    color?: string;
    link?: string;
    function?: string;
}

interface Snackbar {
    type: 'error' | 'primary';
    text: string;
    action?: SnackbarAction;
    persistent?: boolean;
    duration?: 'short' | 'long';
    addClass: string;
}

function snackbar(sb: Snackbar): void {
    if (document.getElementById('snackbar-container') == null) {
        const sb_container: HTMLDivElement = document.createElement("div");
        if (sb.action) {
            if (sb.action.link !== undefined) {
                sb_container.onclick = () => {
                    window.location.href = host + '/cart/'
                };
            }
        }

        if (sb.addClass) {
            sb_container.classList.add(sb.addClass);
        }
        sb_container.setAttribute("id", "snackbar-container");
        document.querySelector("body")?.appendChild(sb_container);
    }

    const snackbar_el: HTMLDivElement = document.createElement("div");
    snackbar_el.classList.add("snackbar");

    switch (sb.type) {
        case 'error':
            snackbar_el.classList.add("sb-error");
            break;
        case 'primary':
            snackbar_el.classList.add("sb-primary");
            break;
        default:
            snackbar_el.classList.add("sb-primary");
            break;
    }
    if (sb.text) {
        const snackbar_text: HTMLDivElement = document.createElement("div");
        snackbar_text.classList.add("snackbar-text");
        snackbar_text.innerHTML = sb.text;
        snackbar_el.appendChild(snackbar_text);
    }


    if (sb.action !== undefined) {
        const snackbar_action: HTMLDivElement = document.createElement("div");
        snackbar_action.classList.add("snackbar-action");

        const snackbar_action_text: HTMLAnchorElement = document.createElement("a");
        snackbar_action_text.innerHTML = sb.action.text;

        if (sb.action.color !== undefined) {
            snackbar_action_text.style.color = sb.action.color;
        }

        if (sb.action.link !== undefined) {
            // snackbar_action_text.setAttribute("href", sb.action.link);
        }

        if (sb.action.function !== undefined) {
            snackbar_action_text.addEventListener("click", function () {
                const snackbarFunction = new Function(sb.action.function);
                snackbarFunction();
            });
        }

        snackbar_action.appendChild(snackbar_action_text);
        snackbar_el.appendChild(snackbar_action);
    }

    document.getElementById('snackbar-container')?.appendChild(snackbar_el);

    if (sb.persistent === undefined || sb.persistent !== true) {
        const duration: number = (sb.duration === undefined || sb.duration === "short") ? DURATION.SHORT : (sb.duration === "long" ? DURATION.LONG : DURATION.SHORT);
        setTimeout(() => {
            snackbar_el.classList.add("sb-out");
        }, duration);

        setTimeout(() => {
            snackbar_el.remove();
        }, duration + 450);
    }
}
//focusin out
// animateCSS('.search-box', 'bounce');
const count_shoping_cart_sapn = document.querySelector('span.count-shoping-cart')
const reload_count_cart_shop = () => {
    let data_local = localStorage.getItem('carts_data');
    if (data_local && count_shoping_cart_sapn) {
        count_shoping_cart_sapn.innerHTML = JSON.parse(data_local).length;
    }
}

function toPerNum(input: string | number | null | undefined): string {
    if (input === null || input === undefined) return '';
    return String(input).replace(/\d/g, (digit: string): string => {
        return '۰۱۲۳۴۵۶۷۸۹'[Number(digit)];
    });
}

const tailwind_loader: string = '<span class="loader"></span>'
const remove_icon_cart: string = `<i class="fa fa-times font-bold scale-125" aria-hidden="true"></i>`;
function reload_button_add_cart_events() {
    reload_count_cart_shop()
    const buttons_add_carts = document.querySelectorAll('button.add-to-cart');
    buttons_add_carts.forEach(button_add_cart => {
        const button = button_add_cart;
        let icon = button_add_cart.querySelector('i');
        if (icon) {
            let data_local = localStorage.getItem('carts_data');
            let founded = false;
            if (data_local) {
                let items: { count: string, id: string }[] = JSON.parse(data_local);
                items.forEach(item => {
                    if (item.id == button.dataset.id) {
                        founded = true;
                    }
                });
            }
            const button_controll = button.parentElement?.querySelector("div.box-card-control");
            if (!founded) {
                button_controll?.classList.add("hidden")
                button.classList.remove("hidden")
            } else {
                button_controll?.classList.remove("hidden")
                button.classList.add("hidden")
            }
            button.onclick = (event: Event) => {
                let button_controll = button.parentElement?.querySelector("div.box-card-control");
                let founded = false;
                let data_local = localStorage.getItem('carts_data');
                if (data_local) {
                    let items: { count: string, id: string }[] = JSON.parse(data_local);
                    items.push({ id: button.dataset.id, count: 1 });
                    localStorage.setItem("carts_data", JSON.stringify(items))
                }
                buttons_add_carts.forEach(button_addcart => {
                    if (button_addcart.dataset.id == button.dataset.id) {
                        let button_controll = button_addcart.parentElement?.querySelector("div.box-card-control");
                        button_controll?.classList.remove("hidden")
                        button_addcart.classList.add("hidden")
                    }
                })

                reload_count_cart_shop()
                load_controller_card()
            }
        }

    })
}
window.reload_button_add_cart_events = () => {
    reload_button_add_cart_events()
};

reload_button_add_cart_events()




function price(price: Number): String {
    price = Math.ceil(price / 1000) * 1000;

    const type = ['', 'هزار', 'میلیون', 'میلیارد', 'تیلیارد'];
    const priceLen = String(price).length;
    const select33 = Math.ceil(priceLen / 3);

    const resultArray = [];

    for (let i = 0; i < select33; i++) {
        const num = String(price)
            .split('')
            .reverse()
            .join('')
            .substr(i * 3, 3);

        if (parseInt(num, 10)) {
            resultArray.push(
                String(parseInt(num.split('').reverse().join(''), 10)) +
                '‌ ' +
                type[i]
            );
        }
    }

    return toPerNum(resultArray.reverse().join(' و ') + '‌تومان');
}





const box_search: HTMLElement | null = document.querySelector('div.search-box');
const lable_search = document.querySelector('div.label-text-search');
const search_bar: HTMLElement | null = document.querySelector('div.search-bar');
const button_search_open: HTMLElement | null = document.querySelector('.button-search-open')
const close_button_search: HTMLElement | null = document.querySelector('div.search-bar div.close-search');
let input_search: HTMLInputElement | null | undefined = box_search?.querySelector('input')
let similer_text = box_search?.querySelector('div.similer-text')
let parent_box: HTMLElement | null | undefined = box_search;//loading_search
let similar_items_box = parent_box?.querySelector('div.similer-box');
let loading_search = parent_box?.querySelector('div.loading-search');
let similer_text_inner = parent_box?.querySelector('span.similer-text-inner');
let similar_items: HTMLElement | null = document.querySelector('div.search-box div.similar-items')
let open_or_close = () => {
    if (input_search?.value.length && similar_items_box?.classList.contains('hidden')) {
        similar_items_box?.classList.remove('hidden');
        animateCSS(similar_items_box, 'fadeInUp')
    } else if (!input_search?.value && !similar_items_box?.classList.contains('hidden')) {
        animateCSS(similar_items_box, 'fadeOutDown').then((message) => {
            similar_items_box?.classList.add('hidden');
        });
    }
}
let function_search_key = () => {
    open_or_close();
    loading_search?.classList.remove('hidden')
    if (similar_items)
        similar_items.innerHTML = '';
    if (input_search?.value && input_search.value.length > 3) {
        let url = host + '/api/sentence/' + input_search.value;
        window.axios({
            method: 'get',
            url: url,
        }).then(function (response: any) {
            if (!(input_search?.value.trim() == response.data)) {
                similer_text?.classList.remove('hidden');
                if (similer_text_inner) {
                    similer_text_inner.innerHTML = response.data;
                }
            } else {
                similer_text?.classList.add('hidden');
            }
        }).catch(function (error: Error) {
        }).then(function () { });
    }
    if (input_search?.value) {
        window.axios({
            method: 'get',
            url: host + '/api/search/1/5/' + input_search.value,
        }).then(function (response: any) {
            let data: { id: string, price: number, img: string, name: string, url: string, off: string }[] = response.data;
            if (similar_items) {
                if (response.data.length) {
                    similar_items.classList.remove('hidden');
                    loading_search?.classList.add('hidden');
                    similar_items.innerHTML = '';
                    data.forEach(item => {

                        if (similar_items)
                            similar_items.innerHTML += format_item_bar_product(item);
                    });
                    reload_button_add_cart_events()
                } else {
                    similar_items.innerHTML = '<p class="text text-lg w-full">هیچ آیتمی پیدا نشد</p>'
                    loading_search?.classList.add('hidden');
                }
            }
        }).catch(function (error: Error) {
        }).then(function () { });
    }
};

input_search?.addEventListener('keyup', function_search_key)
similer_text?.addEventListener('click', () => {
    if (input_search && similer_text_inner) {
        input_search.value = similer_text_inner?.innerHTML.trim();
    }
    function_search_key()
})

input_search?.addEventListener('click', () => {
    animateCSS(input_search, 'headShake');
    animateCSS(lable_search, 'bounceOutLeft').then((message) => {
        lable_search?.classList.add('opacity-0')
        lable_search?.classList.remove('h-40')
        lable_search?.classList.add('h-0')
    });
})

const close_search = (event: Event) => {
    if (event.target == search_bar) {
        lable_search?.classList.remove('opacity-0')
        lable_search?.classList.add('h-40')
        lable_search?.classList.remove('h-0')
        animateCSS(similar_items_box, 'fadeOutDown').then((message) => {
            similar_items_box?.classList.add('hidden');
        });

    }
};
search_bar?.addEventListener('click', close_search)





const open_search_bar = () => {
    if (button_search_open && search_bar) {
        lable_search?.setAttribute('class', 'h-40 p-5 flex items-center label-text-search');
        animateCSS(button_search_open, 'headShake');
        animateCSS(search_bar, 'fadeIn');
        search_bar.classList.remove('hidden')
    }
};
const close_search_bar = () => {
    if (button_search_open && search_bar) {
        animateCSS(close_button_search, 'headShake');
        animateCSS(search_bar, 'fadeOut').then((message) => {
            search_bar.classList.add('hidden')
        })
        lable_search?.classList.remove('opacity-0')
        lable_search?.classList.add('h-40')
        lable_search?.classList.remove('h-0')
        animateCSS(similar_items_box, 'fadeOutDown').then((message) => {
            similar_items_box?.classList.add('hidden');
        });
    }
};

const buttons_search = document.querySelectorAll('div.search-box .fa-search')
const loader_search = () => {
    buttons_search.forEach(button_search => {
        button_search.classList.remove('.fa', '.fa-search')
        button_search.classList.add('fa', 'fa-spinner', 'fa-pulse', 'fa-3x', 'fa-fw');
    });
}
buttons_search.forEach(button_search => {
    button_search.addEventListener('click', () => {
        loader_search()
        let input: HTMLInputElement | null | undefined = button_search.parentElement?.querySelector('input');
        if (input) {
            window.location.href = host + '/search/1/' + input.value;
        }
    })
});
const search_forms: NodeListOf<HTMLFormElement> = document.querySelectorAll('form.search_forms');
search_forms.forEach(search_form => {
    search_form.addEventListener('submit', (e) => {
        e.preventDefault();
        loader_search()
        let form_input: HTMLInputElement | null = search_form.querySelector('input');
        if (form_input) {
            window.location.href = host + '/search/1/' + form_input.value;
        }
    })
});



const carts: NodeListOf<HTMLElement> = document.querySelectorAll('div.cart-shoping');
const all_price_cart_results = document.querySelectorAll('span.price-all');
const price_results = document.querySelectorAll('span.result-price');
const show_price_sends = document.querySelectorAll('div.show-price-send ');
const show_free_sends = document.querySelectorAll('div.show-free-send ');
const box_buttons_pay = document.querySelector('div.box-buttons');
const cart_box = document.querySelector('div.cart-shoping-main');

// const all_data
const renderCartLocal = () => {
    let data: any = localStorage.getItem('carts_data');
    if (cart_box)
        cart_box.innerHTML = ''
    if (data) {


        let items: { id: number, count: number }[] = JSON.parse(data);
        if (!items.length) {

            const cart_box = document.querySelector('div.cart-shoping-main');
            if (cart_box) {
             
                cart_box.innerHTML += `

           
        <h1 class="text text-center sm:mt-32 text-lg ">
            سبد خرید شما خالی است
        </h1>
        <style>
            .dark a.link-home {
                text-shadow: 2px 2px 1px blue, -2px -2px 1px green
            }

            a.link-home {
                text-shadow: 2px 2px 1px blue, -2px -2px 1px red
            }
        </style>
        <a href="/show-all" class="text link-home block text-center mt-16 text-lg">
            برای اضافه کردن کالا به سبد خرید کلیک کنید
        </a>`

            }
        }

        if (cart_box) {
            window.axios({
                method: 'post',
                url: host + '/translate-data-cart',
                data: { data: JSON.parse(data) }
            }).then(function (response: any) {
                if (response.data) {
                    let data: any[] = response.data;
                    data.forEach(item => {
                        cart_box.innerHTML += `
                        <div class="flex cart-shoping relative bg-gray-100 dark:bg-gray-900 p-2 rounded-2xl  mb-4 "  data-price="${item.off ? item.price - (item.price / 100) * item.off : item.price}" data-id="${item.id}" id="${item.id}" data-type="${item.type}">
               
                        <div class=" relative" >
                        <div class="absolute right-0 bottom-0  size-full flex justify-center items-end" >
                                   <div class="w-full p-2">
                                          
                                            <div data-id="{{ $selected->id }}" id="{{ $selected->id }}"
                                                class="group !flex  w-full   box-card-control  bg-white/10 backdrop-blur-sm
          text-sm  h-8 px-1 flex justify-between  items-center text-white hover:font-bold  group rounded-full ">
                                                <button
                                                    class="
                                                    bg-white/10 backdrop-blur-sm          hover:bg-white/20
          rounded-full   cursor-pointer text-gray-600 dark:text-gray-100 d flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 plus">

                                                    <svg class="text-gray-100 size-4"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </button>
                                                <span class="number select-none font-bold px-1 text-white ">
                                                     ${item.count}
                                                </span>
                                       <button
                                                    class="
                                                    bg-white/10 backdrop-blur-sm          hover:bg-white/20
          rounded-full   cursor-pointer text-gray-100 d flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 nega">
                                                    <svg class="text-gray-100 size-4"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                        </div>
                  <img class="w-28 h-24 overflow-hidden object-cover rounded-2xl " src="${'/storage/' + item.thumbnail}" alt="">
                </div>
                <div style="width: calc(100% - 88px)" class="flex py-2 flex-col relative justify-around pr-3" >
 <button class=" remove text-white  opacity-80 hover:opacity-100 dark:bg-gray-800 bg-gray-300 absolute left-0 top-0 cursor-pointer flex justify-center items-center size-7 text-lg rounded-full">
                        <svg class=" size-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
	<path d="M0 0h24v24H0z" fill="none" />
	<path fill="currentColor" d="m13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
</svg>

                     </button>
                  <p class="text flex justify-between">
                     <a href="${'/product/' + item.id}" class="text-sm select-none font-bold">${item.name}</a>
                  
                  </p>
                
                  <p class="text text-sm  ">
                    <div class="flex justify-between  items-center">
                         <p class=" select-none  w-full flex-nowrap text-sm text-nowrap text">
                                ${price(item.off ? item.price - (item.price / 100) * item.off : item.price)}   
                  </p> 
              
                        </div>

                        </div>
                  </p>

                </div>
          </div>
                        `
                    });

                    if (carts.length) {
                        let data: any = localStorage.getItem('carts_data');
                        let data_response: any[] = response.data;
                        if (data) {
                            let items: { id: number, count: number }[] = JSON.parse(data);
                            items.forEach(item => {
                                carts.forEach(cart => {
                                    if (cart.dataset.id == String(item.id)) {
                                        let numbers = cart.querySelectorAll('span.number');
                                        numbers.forEach(number => {
                                            number.innerHTML = String(item.count);
                                        });
                                    }
                                });
                            });

                        }
                    }
                    let dat: any = localStorage.getItem('carts_data');
                    if (dat) {
                        let data_response: any[] = data;
                        let item_res: any[] = [];
                        let items: { id: number, count: number }[] = JSON.parse(dat);
                        data_response.forEach(item_response => {
                            items.forEach(item => {
                                if (item_response.id == item.id) {
                                    item_res.push(item)
                                }
                            });

                        });
                        localStorage.setItem('carts_data', JSON.stringify(item_res))
                    }

                }

                load_evens_carts()
            })
        }
    }
}


function plusItemCard(id: number) {
    let cards_local_storage = localStorage.getItem('carts_data');
    let card_edited = [];
    if (cards_local_storage) {
        let cards = JSON.parse(cards_local_storage)
        cards.forEach(card => {
            if (card.id == id) {
                card_edited.push({ id: card.id, count: card.count + 1 })
            } else {
                card_edited.push(card)
            }
        });
    }
    localStorage.setItem("carts_data", JSON.stringify(card_edited));
    load_controller_card()
}

function negaItemCard(id: number) {
    let cards_local_storage = localStorage.getItem('carts_data');
    let card_edited = [];
    if (cards_local_storage) {
        let cards = JSON.parse(cards_local_storage)
        cards.forEach(card => {
            if (card.id == id) {
                card_edited.push({ id: card.id, count: card.count - 1 })
            } else {
                card_edited.push(card)
            }
        });
    }
    localStorage.setItem("carts_data", JSON.stringify(card_edited));
    load_controller_card()

}

function removeItemCard(id: number) {
    let cards_local_storage = localStorage.getItem('carts_data');
    let card_edited = [];
    if (cards_local_storage) {
        let cards = JSON.parse(cards_local_storage)
        cards.forEach(card => {
            if (card.id !== id) {
                card_edited.push(card)
            }
        });
    }
    localStorage.setItem("carts_data", JSON.stringify(card_edited));
}




function load_controller_card() {
    const boxs_card_control: NodeListOf<HTMLElement> = document.querySelectorAll('div.box-card-control')

    let cards_local_storage = localStorage.getItem('carts_data');
    if (cards_local_storage) {
        boxs_card_control.forEach(box_card_control => {
            let cards = JSON.parse(cards_local_storage)
            let number = box_card_control.querySelector("span.number");
            let plus_butt = box_card_control.querySelector("button.plus");
            let nega_butt = box_card_control.querySelector("button.nega");
            if (number && plus_butt && nega_butt) {
                let count_of_cart = 0;
                let id = 0;
                cards.forEach(card => {
                    if (card.id == box_card_control.dataset.id) {
                        number.innerHTML = card.count;
                        count_of_cart = card.count;

                    }
                    id = card.id
                });



                nega_butt.onclick = () => {
                    if (count_of_cart >= 1) {
                        negaItemCard(box_card_control.dataset.id);
                    } else {
                        boxs_card_control.forEach(box_control => {
                            if (box_control.dataset.id == box_card_control.dataset.id) {
                                box_control.parentElement?.querySelector("button")?.classList.remove("hidden")
                                box_control.classList.add("hidden")
                                removeItemCard(box_control.dataset.id)
                            }
                        });
                        reload_count_cart_shop()
                    }
                };




                plus_butt.onclick = () => { plusItemCard(box_card_control.dataset.id) };


                // nega_butt.addEventListener("click", () => { negaItemCard(box_card_control.dataset.id) })
            }
        });
    }
}

load_controller_card()
function load_evens_carts() {
    const carts: NodeListOf<HTMLElement> = document.querySelectorAll('div.cart-shoping');

    carts.forEach(cart => {
        let plus_buttons = cart.querySelectorAll('button.plus');
        let type = cart.dataset.type;
        let nega_buttons = cart.querySelectorAll('button.nega');
        let numbers = cart.querySelectorAll('span.number');
        let remove_buttons = cart.querySelectorAll('button.remove');
        const save_data = () => {
            let data = [];
            const carts: NodeListOf<HTMLElement> = document.querySelectorAll('div.cart-shoping');
            carts.forEach(cart => {
                let number = cart.querySelector('span.number');
                if (number) {
                    data.push({ id: cart.dataset.id, count: parseFloat(number.innerHTML) })
                }
                localStorage.setItem('carts_data', JSON.stringify(data))
            });
        }
        const functionPlus = () => {

            numbers.forEach(number => {
                let num = parseFloat(number.innerHTML);
                number.innerHTML = String(num + 1);
            })
            save_data()
            load_controller_card()
        }
        const functionNega = () => {
            numbers.forEach(number => {
                let num = parseFloat(number.innerHTML);
                if (num - 1 < 0) {
                    number.innerHTML = '0';
                } else {
                    number.innerHTML = String(num - 1);
                }
            })
            save_data()
            load_controller_card()
        }
        plus_buttons.forEach(plus_button => {

            plus_button.addEventListener('click', () => { functionPlus() })
        })

        nega_buttons.forEach(nega_button => {
            nega_button.addEventListener('click', () => { functionNega() })
        })

        remove_buttons.forEach(remove_button => {
            remove_button.addEventListener('click', () => {
                animateCSS(cart, 'fadeOutLeft').then((message) => {
                    cart.classList.add('hidden')
                })
                let data: any = localStorage.getItem('carts_data');
                let result_data: { id: number, count: number }[] = [];
                if (data) {
                    let items: { id: number, count: number }[] = JSON.parse(data);
                    items.forEach(item => {
                        if (item.id !== cart.dataset.id) {
                            result_data.push(item);
                        }

                    });
                }
                localStorage.setItem('carts_data', JSON.stringify(result_data));
                window.axios({
                    method: 'delete',
                    url: host + '/remove-cart/' + cart.dataset.id,
                }).then(function (response: any) {
                }).catch(function (error: Error) {
                }).then(function () { });
                reload_count_cart_shop()
                reload_button_add_cart_events()
            })





        })



    })


}


// renderCartLocal()


const button_bar: HTMLElement | null = document.querySelector('button.button-bar');
const div_bar: HTMLElement | null = document.querySelector('div.div-bar');
const div_navbar_item: HTMLElement | null = document.querySelector('div.div-navbar-items');
const div_bar_item: HTMLElement | null | undefined = div_bar?.querySelector('div.div-bar-item');
type format_item_bar_type = { img: string, name: string, url: string, count: string };
type item_navbar_type = { link: string, text: string, icon: string };
const text_address_bar: HTMLElement | null | undefined = div_bar?.querySelector('p.text-address-bar');

function change_address(links: ({ link: string, text: string })[]) {
    if (text_address_bar) {
        text_address_bar.innerHTML = '';
        let tags_a: string[] = [];
        links.forEach(link => {
            tags_a.push(`<a class=" hover:text-blue-500" href="${current_url.split("#")[0] + link.link}">${link.text}</a>`)
        });
        text_address_bar.innerHTML = tags_a.join(' / ')
    }
}
function format_item_navbar(data: item_navbar_type): string {
    let left_or_right: string = '';
    if (!data.icon.includes('info')) {
        left_or_right = '-scale-x-100'
    }
    return `
    <div>
    <a class=" animate__animated  animate__bounceInRight group mx-2  text-black dark:text-white 
    text-md sm:text-lg hover:after:w-full after:transition-all after:w-0 after:content-['']
     after:rounded-md after:right-1 after:bg-primary-200 after:h-1 relative after:absolute after:-bottom-1 group-hover:font-bold
                 items-center inline-flex hover:font-bold"
                    href="${data.link}">
                    <i style="transition: 0s !important"
                        class=" ${data.icon} group-hover:font-bold ${left_or_right} fa mx-2 text-lg sm:text-xl"
                        aria-hidden="true"></i>
                    <span
                        class=" group-hover:font-bold ">${data.text}</span>
                </a>
    </div>

    `
}
function format_item_bar(data: format_item_bar_type): string {
    return `
     <a href='${data.url} ' class="sm:w-96 group w-full mb-4">
    <div  class="animate__animated  animate__zoomIn similar_item cursor-pointer p-2 flex bg-white border border-gray-200 rounded-lg  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div class=" flex-shrink-0 flex justify-center items-center  relative">
                <div class=" size-36 " >
                <img class=" size-full  " src="${host + '/storage/' + data.img}" alt="">
                </div>
        </div>
        <div class="p-2 pt-6 flex flex-col w-full justify-between">
            <p class=" text-2xl text text-center  w-full font-bold ">
            ${data.name}
            </p>
            <p class="text mt-8 mr-4 justify-center text-center flex items-center opacity-60">
                  <span class="mt-1 font-bold text-xl"> ${data.count} </span> <span class="mr-2 mt-0.5"> محصول </span>
            </p>
            <br>
        </div>
    </div>
    </a>
`;
}

const open_bar = () => {
    if (div_bar?.classList.contains('hidden')) {
        div_bar?.classList.remove('hidden');
        animateCSS(div_bar, 'fadeIn');
    }
}
const close_bar = () => {
    if (!div_bar?.classList.contains('hidden')) {
        animateCSS(div_bar, 'fadeOut').then((message) => {
            div_bar?.classList.add('hidden')
        })
    }
}
const div_nav_cart = document.querySelector('div.div-nav-cart');
const div_slide_nav = document.querySelector('div.slide-nav');
var controll_click = 0;
if (div_nav_cart) {
    div_nav_cart.addEventListener('click', (event) => {
        if (event.target == div_nav_cart) {
            if (!controll_click) {
                window.history.back();
                controll_click = 1;
            }
            setTimeout(() => {
                controll_click = 0
            },
                3000)
        }
    })
}



const open_cart_bar = () => {
    renderCartLocal()
    div_nav_cart?.classList.remove('hidden')
    setTimeout(() => {
        div_slide_nav?.classList.add('right-0')
        div_slide_nav?.classList.remove('-right-72')
    }, 100)
}



const close_cart_bar = () => {
    div_slide_nav?.classList.add('-right-72')
    div_slide_nav?.classList.remove('right-0')
    setTimeout(() => {
        div_nav_cart?.classList.add('hidden')
    }, 1000)
}

// load_controller_card
const function_onchange = () => {
    let hash_string: string = window.location.hash.substring(1);
    if (hash_string.includes('category')) {
        document.documentElement.classList.add('overflow-hidden');
    } else {
        document.documentElement.classList.remove('overflow-hidden');
    }

    if (div_bar && button_bar && hash_string.includes('category')) {
        if (text_address_bar)
            text_address_bar.innerHTML = `<a class=" hover:text-blue-600" href="#category">دسته بندی ها</a>`;
        if (div_navbar_item)
            div_navbar_item.innerHTML = '';
        if (div_bar_item)
            div_bar_item.innerHTML = '';

        open_bar();
        let hash_splite: string[] = hash_string.split('_');
        if (hash_string == 'category') {
            window.axios({
                method: 'get',
                url: host + '/api/all-category',
            }).then(function (response: any) {
                let categories: (any)[] = response.data;
                change_address([{ text: 'دسته بندی ها', link: '#category' }])

                categories.forEach(category => {
                    if (div_bar_item) {
                        let category_result: any = category
                        category_result.url = '#category_' + category.id;
                        div_bar_item.innerHTML += format_item_bar(category);
                    }
                });


            }).catch(function (error: Error) {
            }).then(function () { });
        } else {
            window.axios({
                method: 'get',
                url: host + '/api/product/category/' + hash_splite[1],
            }).then(function (response: any) {
                let products: (any)[] = response.data;
                products.forEach(product => {
                    if (div_bar_item) {
                        let product_result: any = product
                        product_result.url = '/product/' + product.id;
                        product_result.img = [product.thumbnail, ...JSON.parse(product.images)];
                        product_result.id = product.id;
                        product_result.price = product.price;
                        product_result.off = product.off;
                        div_bar_item.innerHTML += format_item_bar_product(product_result);
                    }
                });
                reloadImageSwich()
                reload_button_add_cart_events()
                load_controller_card()
                window.axios({
                    method: 'get',
                    url: host + '/api/category/id/' + hash_splite[1],
                }).then(function (response: any) {
                    change_address([{ text: 'دسته بندی ها', link: '#category' }, { link: '#' + hash_string, text: response.data[0].name }])
                }).catch(function (error: Error) {
                }).then(function () { });


            }).catch(function (error: Error) {
            }).then(function () { });
        }
    }
    if (parseInt(hash_string) > 0) {
        let element_scroll: HTMLElement | null = document.getElementById('T' + hash_string);
        if (element_scroll) {
            let doc = document.documentElement;
            let offset_top_el = element_scroll.offsetTop - 150;
            doc.scrollTop = offset_top_el;
        }
    }
    if (hash_string == 'bar') {

        if (text_address_bar)
            text_address_bar.innerHTML = 'منو';
        if (div_bar_item)
            div_bar_item.innerHTML = '';
        if (div_navbar_item)
            div_navbar_item.innerHTML = '';
        open_bar();
        let items: item_navbar_type[] = [];
        let items_navbar: NodeListOf<HTMLLinkElement> = document.querySelectorAll('div#item_navbar a');
        items_navbar.forEach(item_navbar => {
            let item: item_navbar_type = { link: '', text: '', icon: '' };
            item.link = item_navbar.href;
            item.icon = item_navbar.children[0].classList[0];
            item.text = item_navbar.children[1].innerHTML;
            items.push(item)
        })

        items.forEach(item => {
            if (div_navbar_item) {
                div_navbar_item.innerHTML += format_item_navbar(item);
            }
        })
    }
    if (hash_string == 'search') {
        open_search_bar();
    } else if (!search_bar?.classList.contains('hidden')) {
        close_search_bar();
    }


    if (hash_string == 'cart') {
        open_cart_bar();
    } else if (!div_nav_cart?.classList.contains('hidden')) {
        close_cart_bar();
    }


    if (!(div_bar && button_bar && hash_string.includes('category')) && !(hash_string == 'bar')) {
        close_bar();
    }
}
function_onchange();
window.addEventListener('hashchange', function_onchange);


const input_copys: NodeListOf<HTMLInputElement> = document.querySelectorAll("input.textLink");
const copyButtons: NodeListOf<HTMLElement> = document.querySelectorAll(".copy");

for (let i = 0; i < copyButtons.length; i++) {
    const copyButton = copyButtons[i];
    const input_copy = input_copys[i];
    const copyText = (e: any) => {
        // window.getSelection().selectAllChildren(textElement);
        if (input_copy)
            input_copy.select(); //select input value
        document.execCommand("copy");
        e.currentTarget.setAttribute("tooltip", "کپی شد !");
    };

    const resetTooltip = (e: any) => {
        e.currentTarget.setAttribute("tooltip", "کپی کردن آدرس");
    };
    if (copyButton) {
        copyButton.addEventListener("click", (e) => copyText(e));
        copyButton.addEventListener("mouseover", (e) => resetTooltip(e));
    }
}


const boxs_share: NodeListOf<HTMLElement> = document.querySelectorAll('ul.share-box');

// ---------- Share Applications ----------
const applications: { name: string, format: string, fa_name: string }[] = [
    { name: 'telegram', format: 'https://t.me/share/url?url={url}&text={text}', fa_name: 'تلگرام' },
    { name: 'facebook', format: 'https://www.facebook.com/share.php?u={url}&t={text}', fa_name: 'فیسبوک' },
    { name: 'eitaa', format: 'https://www.eitaa.com/share/url?url={text}', fa_name: 'ایتا' },
    { name: 'whatsapp', format: 'https://wa.me/?text={url}', fa_name: 'واتساپ' },
    { name: 'x', format: 'https://www.twitter.com/intent/tweet?url={url}&text={text}', fa_name: 'ایکس (توییتر سابق)' },
];
// ---------- Share Applications ----------
boxs_share.forEach(box_share => {


    applications.forEach(application => {
        if (box_share)
            box_share.innerHTML += `
                   <li class="mx-1" >
                            <a target="_blank" class="group " title = "${'اشتراک گذاری در' + ' ' + application.fa_name}"
                            href="${application.format.replace("{url}", current_url).replace("{text}", name_business + " " + document.title)}">
                                <img class=" group-hover:scale-125  group-hover:rotate-[360deg] size-10 rounded-full object-cover overflow-hiddens "
                                 src="${host + '/image/app/' + application.name + '.jpg'}">
                            </a>
                        </li>       
    `
    })
});



const show_count_comments: null | HTMLElement = document.querySelector('b.show-count-comments');
var count_comment = 0;
function ReloadComments() {
    if (show_count_comments) {
        window.axios({
            method: 'post',
            url: host + '/get-comments/' + window.page_id,
        }).then(function (response: any) {
            let comments: (any)[] = response.data;
            let accepted_comment = 0;
            comments.forEach(comment => {
                accepted_comment++
            });
            if (show_count_comments) {
                show_count_comments.innerHTML = '(' + accepted_comment + ')';
                count_comment = accepted_comment;
            }
        }).catch(function (error: Error) {
        }).then(function () { });
    }
}
window.onload = () => {
    ReloadComments()
}
const textarea_comment: null | HTMLInputElement = document.querySelector('div.comment textarea');
const input_comment: null | HTMLInputElement = document.querySelector('div.comment input');
const button_comment: null | HTMLElement = document.querySelector('div.comment button');

if (button_comment && textarea_comment && input_comment) {

    button_comment.addEventListener('click', () => {
        if (button_comment.innerHTML == 'ارسال') {
            button_comment.innerHTML = `<i class="fa fa-spinner text-[25px] fa-pulse fa-3x fa-fw"></i>`;
            let text = textarea_comment.value;
            let name = (input_comment.value) ? input_comment.value : 'ناشناس';
            if (input_comment.value)
                localStorage.setItem('name', input_comment.value);
            window.axios.post('/user/send-comment', {
                text: text,
                name: name,
                page_id: window.page_id
            })
                .then(function (response: { data: any }) {
                    alert(response.data);
                    textarea_comment.value = '';
                    button_comment.innerHTML = `ارسال`
                })
                .catch(function (error: any[]) {
                });
        }
    })
    let name = localStorage.getItem('name');
    if (name) {
        input_comment.value = name;
    }
}

const button_show_comments: null | HTMLElement = document.querySelector('button.comment-show');
const comment_box: null | HTMLElement = document.querySelector('section.comment-box')
const text_button_comment_hidden = 'پنهان کردن کامنت ها';
let text_button_comment_now: string = '';
if (button_show_comments && comment_box && show_count_comments) {
    button_show_comments.addEventListener('click', () => {
        if (count_comment) {
            if (!text_button_comment_now) {
                text_button_comment_now = button_show_comments.innerHTML;
            }
            if (button_show_comments.innerHTML == text_button_comment_hidden) {
                comment_box.innerHTML = '';
                button_show_comments.innerHTML = text_button_comment_now;
            } else {
                button_show_comments.innerHTML = `<i class="fa fa-spinner text-[25px] fa-pulse fa-3x fa-fw"></i>`
                window.axios({
                    method: 'post',
                    url: host + '/get-comments/' + window.page_id,
                }).then(function (response: any) {
                    let comments: (any)[] = response.data;
                    comments.forEach(comment => {
                        comment_box.innerHTML += `
                        <div class="w-full animate__animated  animate__bounceInRight mb-3 mx-auto px-4">
                            <article class="p-6 w-full text-base bg-white rounded-lg  dark:bg-gray-800">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p
                                            class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                            <img class="mr-2 w-6 h-6 ml-2 object-cover rounded-full"
                                                src="${comment.img}"
                                                alt="Michael Gough">${comment.name}
                                        </p>
                                        <p class="text-sm text-gray-600 mr-2 dark:text-gray-200">
                                        <span>${comment.time.day}</span> 
                                        <span>${comment.time.month}</span> 
                                        <span>${comment.time.year}</span> 
                                        <span>${comment.time.clock}</span> 
                                        </p>
                                    </div>
    
                                </footer>
                                <p class="text-gray-500 w-full dark:text-gray-400">
                                ${comment.text}
                                </p>

                                 ${comment.replay ?
                                '<div class="bg-gray-600 mt-3 p-3 rounded-lg text" >'
                                +
                                '<p class="text mb-3">پاسخ ادمین :</p>'
                                +
                                comment.replay
                                +
                                '</div>'
                                : ''}
                            </article>
                        </div>`

                    });
                    button_show_comments.innerHTML = text_button_comment_hidden;
                }).catch(function (error: Error) {
                }).then(function () { });

            }
        }
    })
}

var blog: HTMLElement | null = document.querySelector('div.amount');
const nav_blog: HTMLElement | null = document.querySelector('div.nav-blog');
const div_titles_blog: HTMLElement | null = document.querySelector('div.titles');
const product_div: HTMLElement | null = document.querySelector('div.product-div');
if (product_div) {
    blog = product_div
}
if (blog && nav_blog) {
    const set_hight = () => {
        let blog_main: HTMLElement | null = document.querySelector('div.blog-main');
        if (window.innerWidth > 768) {
            if (blog_main)
                nav_blog.style.height = blog_main.offsetHeight - 100 + 'px';
        } else {
            if (blog_main)
                nav_blog.style.height = 'auto';
        }
    }
    set_hight()
    setTimeout(() => {
        setInterval(() => {
            set_hight()
        }, 100)
    }, 5000)
    const headers_tag: NodeListOf<HTMLElement> = document.querySelectorAll('div.amount h2');
    for (let i = 0; i < headers_tag.length; i++) {
        let element: HTMLElement | null = headers_tag[i];
        let span: HTMLElement | null = element.querySelector('span')
        let text = '';
        if (span) {
            text = span.innerHTML.trim();
        } else {
            text = element.innerHTML.trim();
        }
        element.id = 'T' + String(i + 1);
        if (div_titles_blog)
            div_titles_blog.innerHTML += `    
<a class=" block mt-4 group" href="${'#' + String(i + 1)}">
                        <div class="flex  items-center">
                            <div class="loader1"></div>
                            <span
                                class="text group-hover:after:w-full after:transition-all group-hover:font-bold after:w-0 after:content-[''] after:rounded-md after:right-0 after:dark:bg-white after:bg-primary-200 after:h-[3px] relative after:absolute after:-bottom-2  text-lg mr-3">
                                ${text}
                            </span>
                        </div>
</a>
`
    }

}



// remove labal 
let itemsShouldRemove = ["div.leaflet-bottom.leaflet-right", 'a[href*="neshan.org"]', 'a[href*="openstreetmap.org"]']

window.addEventListener('load', () => {

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



})




const reloadImageSwich = () => {
    let similars_item = document.querySelectorAll('div.similar_item');

    similars_item.forEach(similar_item => {
        let imgs: NodeListOf<HTMLImageElement> = similar_item.querySelectorAll('img');
        let img = imgs[0];
        if (img) {
            similar_item.addEventListener('mouseover', () => {
                let data_img = img.dataset.src;
                if (data_img) {
                    let images = JSON.parse(data_img);
                    if (images) {
                        if (images[1])
                            img.src = host + '/storage/' + images[1]
                    }
                }
            })
            similar_item.addEventListener('mouseout', () => {
                let data_img = img.dataset.src;
                if (data_img) {
                    let images = JSON.parse(data_img);
                    if (images) {
                        img.src = host + '/storage/' + images[0]
                    }
                }
            })
        }
    });
}
reloadImageSwich()