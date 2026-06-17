"use strict";
var current_url = window.location.href;
if (!localStorage.getItem('carts_data')) {
    localStorage.setItem('carts_data', JSON.stringify([]));
}
const animateCSS = (element, animation, prefix = 'animate__') => 
// We create a Promise and return it
new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    let node_element = null;
    if (typeof element == 'string') {
        let get_element = document.querySelector(element);
        if (get_element) {
            node_element = get_element;
        }
    }
    else {
        node_element = element;
    }
    if (node_element) {
        node_element.classList.add(`${prefix}animated`, animationName);
        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
            event.stopPropagation();
            if (node_element)
                node_element.classList.remove(`${prefix}animated`, animationName);
            resolve('Animation ended');
        }
        node_element.addEventListener('animationend', handleAnimationEnd, { once: true });
    }
});
{
    const all_input_items = document.querySelectorAll("div.input-admin");
    const characters_en = "QWERTYUIOPLKJHGFDSAZXCVBNM qwertyuiopasdfghjklzxcvbnm,.?!+-@_:/";
    const characters_fa = "ضصثقفغعهخحجچپچشسیبلاتنمکگظطزرذدئو./.وئدذرزطظظشسیبلاتنمکگچجحخهعغفقثصضا، ، ٌٍريالريال،؛،ريالإآـ«»«ُِةةژإء«\\,،ريالٌٍٍريالٌٌٍّؤؤِإّۀأآءآ«ـ«»آ«ـ[ٍ،ريالٌٌٍٍژآ ؟!";
    const numbers = "0987654321 ۱۲۳۴۵۶۷۸۹۰ +";
    const map_pattern = [["fa", characters_fa], ["en", characters_en], ["num", numbers]];
    var host = window.location.protocol + "//" + window.location.host + '/';
    var error_save_element;
    var error_save_count;
    for (let i = 0; i < all_input_items.length; i++) {
        const element = all_input_items[i];
        let input = element.querySelector("input");
        let get_type = input === null || input === void 0 ? void 0 : input.dataset.type;
        let empty_value = () => {
            if (input) {
                input.value = "";
                input.focus();
            }
        };
        //   console.log(element.children[0].children[0])
        input === null || input === void 0 ? void 0 : input.addEventListener("keypress", () => {
            var _a;
            if (all_input_items[i + 1]) {
                (_a = all_input_items[i + 1].querySelector("input")) === null || _a === void 0 ? void 0 : _a.focus();
            }
        });
        input === null || input === void 0 ? void 0 : input.addEventListener("keyup", () => {
            let type = input.dataset.type;
            let characters = input.value;
            for (let index = 0; index < characters.length; index++) {
                const char = characters[index];
                if (typeof (get_type) == 'string') {
                    let array_character_valid = type_to_array_character(get_type);
                    if (!array_character_valid.includes(char)) {
                        if (error_save_element !== input) {
                            error_save_element = input;
                            error_save_count = 1;
                        }
                        else if (input == error_save_element) {
                            error_save_count += 1;
                        }
                        if (error_save_count >= 3) {
                            // push notification
                            //چیز مهمی نیست توجه نکن
                            let div_alert = document.querySelector('div.polipop__closer');
                            if (type && div_alert) {
                                if (div_alert.style.display == 'none') {
                                    if (type.includes('fa')) {
                                        polipop.add({
                                            content: 'لطفا از کلمات فارسی استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                    else if (type.includes('en-num')) {
                                        polipop.add({
                                            content: 'لطفا از کلمات لاتین استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                    else if (type.includes('num')) {
                                        polipop.add({
                                            content: 'لطفا از اعداد استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                }
                            }
                            error_save_count = 0;
                            //چیز مهمی نیست توجه نکن
                        }
                        input.value = input.value.replace(char, '');
                    }
                }
            }
        });
        input === null || input === void 0 ? void 0 : input.addEventListener("focusout", () => {
            let type = input.dataset.type;
            let characters = input.value;
            for (let index = 0; index < characters.length; index++) {
                const char = characters[index];
                if (typeof (get_type) == 'string') {
                    let array_character_valid = type_to_array_character(get_type);
                    if (!array_character_valid.includes(char)) {
                        if (error_save_element !== input) {
                            error_save_element = input;
                            error_save_count = 1;
                        }
                        else if (input == error_save_element) {
                            error_save_count += 1;
                        }
                        if (error_save_count >= 3) {
                            // push notification
                            //چیز مهمی نیست توجه نکن
                            let div_alert = document.querySelector('div.polipop__closer');
                            if (type && div_alert) {
                                if (div_alert.style.display == 'none') {
                                    if (type.includes('fa')) {
                                        polipop.add({
                                            content: 'لطفا از کلمات فارسی استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                    else if (type.includes('en-num')) {
                                        polipop.add({
                                            content: 'لطفا از کلمات لاتین استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                    else if (type.includes('num')) {
                                        polipop.add({
                                            content: 'لطفا از اعداد استفاده کنید',
                                            title: 'ارور',
                                            type: 'error',
                                        });
                                    }
                                }
                            }
                            error_save_count = 0;
                            //چیز مهمی نیست توجه نکن
                        }
                        input.value = input.value.replace(char, '');
                    }
                }
            }
        });
    }
    function type_to_array_character(type_multi) {
        let types = type_multi.split("-");
        let result = " ";
        types.forEach(type => {
            result += type_to_array_character_helper(type);
        });
        return result;
    }
    function type_to_array_character_helper(type) {
        let result = "";
        map_pattern.forEach(pattern => {
            if (type == pattern[0]) {
                result = pattern[1];
            }
        });
        return result;
    }
}
let password_input_div = document.querySelector('div.password-div');
if (password_input_div) {
    let button_show = password_input_div.querySelector('span');
    let input_password = password_input_div.querySelector('input');
    let icon_show = button_show === null || button_show === void 0 ? void 0 : button_show.querySelector('i');
    if (button_show && input_password && icon_show) {
        button_show.addEventListener('mouseout', () => {
            if (icon_show.classList.contains('fa-eye')) {
                input_password.type = 'password';
            }
            else {
                input_password.type = 'text';
            }
        });
        button_show.addEventListener('mouseover', () => {
            if (icon_show.classList.contains('fa-eye')) {
                input_password.type = 'text';
            }
            else {
                input_password.type = 'password';
            }
        });
        button_show.addEventListener('click', () => {
            icon_show.classList.toggle('fa-eye');
            icon_show.classList.toggle('fa-eye-slash');
        });
    }
}
const modal_div = document.querySelector('div.modal');
const cancel_modal_div = document.querySelector('div.modal button.cancel');
const modal_div_body = document.querySelector('div.modal div.body');
const modal_text_message = document.querySelector('div.modal p.text');
const accept_modal_div = document.querySelector('div.modal button.accept');
const function_close_modal_alert = () => {
    if (modal_div) {
        animateCSS(modal_div_body, 'fadeOutUp').then((message) => {
            modal_div.classList.add('hidden');
            modal_div.classList.remove('inline');
        });
    }
};
const myConfirm = (data) => {
    if (modal_text_message)
        modal_text_message.innerHTML = data.text;
    if (modal_div && accept_modal_div) {
        accept_modal_div.onclick = () => {
            data.fn();
            function_close_modal_alert();
        };
        modal_div.classList.remove('hidden');
        modal_div.classList.add('inline');
        animateCSS(modal_div_body, 'fadeInDown');
    }
};
modal_div === null || modal_div === void 0 ? void 0 : modal_div.addEventListener("click", (event) => {
    if (event.target == modal_div) {
        function_close_modal_alert();
    }
});
cancel_modal_div === null || cancel_modal_div === void 0 ? void 0 : cancel_modal_div.addEventListener('click', () => {
    function_close_modal_alert();
});
const buttons_dark_mode = document.querySelectorAll('div.button-dark-mode');
const logos_website = document.querySelectorAll('img.logo');
if (logos_website) {
    buttons_dark_mode.forEach(button_dark_mode => {
        button_dark_mode.addEventListener('click', () => {
            animateCSS(button_dark_mode, 'headShake');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('color-theme', 'light');
                logos_website.forEach((logo_website) => {
                    logo_website.src = logo_website.src.replace('Logo%20dark', 'Logo%20light');
                });
            }
            else {
                localStorage.setItem('color-theme', 'dark');
                logos_website.forEach((logo_website) => {
                    logo_website.src = logo_website.src.replace('Logo%20light', 'Logo%20dark');
                });
            }
            document.documentElement.classList.toggle('dark');
        });
    });
}
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    if (logos_website) {
        logos_website.forEach((logo_website) => {
            logo_website.src = logo_website.src.replace('Logo%20light', 'Logo%20dark');
        });
    }
}
else {
    document.documentElement.classList.remove('dark');
    if (logos_website) {
        logos_website.forEach((logo_website) => {
            logo_website.src = logo_website.src.replace('Logo%20dark', 'Logo%20light');
        });
    }
}
const buttons_logout = document.querySelectorAll('button.button-logout');
buttons_logout.forEach(button_logout => {
    button_logout.addEventListener('click', () => {
        myConfirm({
            text: 'آیا از خروج حساب کاربری اطمینان دارید ؟',
            fn: () => { window.location.href = host + "logout"; }
        });
    });
});
const tailwind_loader = `<div class="w-full text-center flex justify-center" role="status"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-white fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg><span class="sr-only">Loading...</span></div>`;
const button_navbar = document.querySelector('button.navbar-button');
const items_navbar_box = document.querySelectorAll('div.item-navbar-box');
const item_navbar_circle = document.querySelector('div.item-navbar-circle');
var navbar_can_open_or_no = true;
if (button_navbar && item_navbar_circle) {
    button_navbar.addEventListener('click', (event) => {
        let icon = button_navbar.querySelector('i');
        if (icon && navbar_can_open_or_no) {
            animateCSS(button_navbar, 'jello');
            if (icon.classList.contains('fa-bars')) {
                window.location.hash = 'navbar';
            }
            else {
                window.location.hash = '';
            }
        }
    });
}
const input_profile = document.querySelector('input[name~=profile]');
const button_save_info = document.querySelector('button.change-info-user');
const image_profile_navbar = document.querySelector('img#image-profile-navbar');
if (input_profile) {
    input_profile.addEventListener('change', () => {
        const files = input_profile.files;
        if (files) {
            let file = files[0];
            const reader = new FileReader();
            reader.addEventListener("load", function (e) {
                var _a;
                const readerTarget = e.target;
                const img = (_a = input_profile.parentElement) === null || _a === void 0 ? void 0 : _a.children[1];
                if (readerTarget) {
                    img.src = readerTarget.result;
                    if (image_profile_navbar) {
                        image_profile_navbar.src = readerTarget.result;
                    }
                }
            });
            reader.readAsDataURL(file);
            let formdata = new FormData();
            formdata.append("profile", file);
            window.axios.post(host + 'change-profile-image', formdata, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            polipop.add({
                content: 'پروفایل شما با موفقیت تغییر یافت',
                title: 'تبریک',
                type: 'success',
            });
        }
    });
}
if (button_save_info) {
    button_save_info.addEventListener('click', () => {
        let span = button_save_info.children[0];
        if (span) {
            span.innerHTML = tailwind_loader;
        }
    });
}
function price(price) {
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
            resultArray.push(String(parseInt(num.split('').reverse().join(''), 10)) +
                '‌ ' +
                type[i]);
        }
    }
    return toPerNum(resultArray.reverse().join(' و ') + '‌تومان');
}
function toPerNum(input) {
    if (input === null || input === undefined)
        return '';
    return String(input).replace(/\d/g, (digit) => {
        return '۰۱۲۳۴۵۶۷۸۹'[Number(digit)];
    });
}
const carts = document.querySelectorAll('div.cart-shoping');
const all_price_cart_results = document.querySelectorAll('span.price-all');
const price_results = document.querySelectorAll('span.result-price');
const show_price_sends = document.querySelectorAll('div.show-price-send ');
const show_free_sends = document.querySelectorAll('div.show-free-send ');
const box_buttons_pay = document.querySelector('div.box-buttons');
const cart_box = document.querySelector('div.cart-shoping-main');
// const all_data
const renderCartLocal = () => {
    let data = localStorage.getItem('carts_data');
    console.log(data);
    if (data) {
        let items = JSON.parse(data);
        if (!items.length) {
            const cart_box = document.querySelector('div.cart-shoping-main');
            if (cart_box) {
                cart_box.innerHTML += `
                <div class=" flex flex-col justify-center items-center ">

                <h1 class="text text-center sm:mt-32 text-2xl sm:text-4xl">
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
                        <a href="/menu" class="text link-home block text-center mt-16 text-2xl sm:text-4xl">
                        برای اضافه کردن کالا به سبد خرید کلیک کنید
                        </a>
                        </div>
                        `;
            }
            const cart_total_price = document.querySelector("div.cart-total-price");
            if (cart_total_price) {
                cart_total_price.classList.add("hidden");
            }
        }
        if (cart_box) {
            window.axios({
                method: 'post',
                url: host + 'translate-data-cart',
                data: { data: JSON.parse(data) }
            }).then(function (response) {
                if (response.data) {
                    let data = response.data;
                    data.forEach(item => {
                        cart_box.innerHTML += `  
                                  <div class="flex cart-shoping relative bg-white dark:bg-gray-800 p-2 rounded-2xl  mb-4 "  data-price="${item.off ? item.price - (item.price / 100) * item.off : item.price}" data-id="${item.id}" id="${item.id}" data-type="${item.type}">
               
                        <div class=" relative" >
                        <div class="absolute  sm:hidden flex right-0 bottom-0  size-full justify-center items-end" >
                                   <div class="w-full p-2">
                                          
                                            <div data-id="{{ $selected->id }}" id="{{ $selected->id }}"
                                                class="group flex  w-full   box-card-control  bg-white/10 backdrop-blur-sm
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
                  <img class="sm:w-36 sm:h-32 w-28 h-24 overflow-hidden object-cover rounded-2xl " src="${'/storage/' + item.thumbnail}" alt="">
                </div>
                <div style="width: calc(100% - 88px)" class="flex py-2 flex-col relative justify-around pr-3" >
 <button class=" remove sm:top-2 sm:left-3 sm:scale-125 text-white  opacity-80 hover:opacity-100 dark:bg-gray-700 bg-gray-300 absolute left-0 top-0 cursor-pointer flex justify-center items-center size-7 text-lg rounded-full">
                        <svg class=" size-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
	<path d="M0 0h24v24H0z" fill="none" />
	<path fill="currentColor" d="m13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
</svg>

                     </button>
                  <p class="text flex justify-between">
                     <a href="${'/product/' + item.id}" class="text-lg sm:text-xl lg:text-2xl select-none font-bold">${item.name}</a>
                  
                  </p>
                
                  <p class="text text-sm  ">
                    <div class="flex justify-between  items-center">
                        <div class="w-full flex flex-wrap  items-center " >
                      <span class=" select-none   flex-nowrap text-sm sm:text-base lg:text-lg opacity-50 scale-75 line-through  text-nowrap text">
                    ${price(item.price)}   
                    </span> 

                    
                    <b class=" select-none  flex-nowrap text-base sm:text-lg lg:text-xl text-nowrap text">
                    ${price(item.off ? item.price - (item.price / 100) * parseInt(item.off) : item.price)}   
                    </b> 
                  
                    </div>
                     <div data-id="{{ $offer->id }}" id="{{ $offer->id }}"
                                                class="group hidden sm:flex  ml-6    max-w-44  dark:bg-gray-700  bg-gray-200 sm:text-2xl w-full text-lg h-10 sm:h-12 flex justify-between px-1 items-center text-white hover:font-bold  group rounded-full ">
                                                <button
                                                    class="rounded-full dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] cursor-pointer text-gray-600 dark:text-gray-100 dark:bg-gray-600 flex justify-center items-center text-xl sm:text-2xl size-8 sm:size-10 bg-gray-300 plus">

                                                    <svg class="text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </button>
                                                <span class="number font-bold dark:text-white text-gray-800">
                                                    ${item.count} 
                                                </span>
                                                <button
                                                    class="rounded-full cursor-pointer dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] dark:text-gray-100 dark:bg-gray-600   text-gray-600 flex justify-center items-center text-2xl size-8 sm:size-10 bg-gray-300 nega">
                                                    <svg class="  text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                    </svg>
                                                </button>
                                            </div>
                        </div>

                        </div>
                  </p>

                </div>
          </div>
                                    `;
                    });
                    if (carts.length) {
                        let data = localStorage.getItem('carts_data');
                        let data_response = response.data;
                        if (data) {
                            let items = JSON.parse(data);
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
                    let dat = localStorage.getItem('carts_data');
                    if (dat) {
                        let data_response = data;
                        let item_res = [];
                        let items = JSON.parse(dat);
                        data_response.forEach(item_response => {
                            items.forEach(item => {
                                if (item_response.id == item.id) {
                                    item_res.push(item);
                                }
                            });
                        });
                        localStorage.setItem('carts_data', JSON.stringify(item_res));
                    }
                    update_result();
                }
                load_evens_carts();
            });
        }
    }
};
renderCartLocal();
function load_evens_carts() {
    const carts = document.querySelectorAll('div.cart-shoping');
    carts.forEach(cart => {
        let plus_buttons = cart.querySelectorAll('button.plus');
        let type = cart.dataset.type;
        let nega_buttons = cart.querySelectorAll('button.nega');
        let numbers = cart.querySelectorAll('span.number');
        let remove_buttons = cart.querySelectorAll('button.remove');
        console.log(plus_buttons);
        const save_data = () => {
            let data = [];
            const carts = document.querySelectorAll('div.cart-shoping');
            carts.forEach(cart => {
                let number = cart.querySelector('span.number');
                if (number) {
                    data.push({ id: cart.dataset.id, count: parseFloat(number.innerHTML) });
                }
                localStorage.setItem('carts_data', JSON.stringify(data));
            });
        };
        const functionPlus = () => {
            numbers.forEach(number => {
                let speed = 1;
                let num = parseFloat(number.innerHTML);
                number.innerHTML = String(num + speed);
            });
            save_data();
            update_result();
        };
        plus_buttons.forEach(plus_button => {
            plus_button.addEventListener('click', () => { functionPlus(); });
        });
        const functionNega = () => {
            numbers.forEach(number => {
                let speed = 1;
                let num = parseFloat(number.innerHTML);
                if (num - speed < 0) {
                    number.innerHTML = '0';
                }
                else {
                    number.innerHTML = String(num - speed);
                }
            });
            save_data();
            update_result();
        };
        nega_buttons.forEach(nega_button => {
            nega_button.addEventListener('click', () => { functionNega(); });
        });
        remove_buttons.forEach(remove_button => {
            remove_button.addEventListener('click', () => {
                myConfirm({
                    text: "آیا از حذف این آیتم مطمئنید ؟؟؟",
                    fn: () => {
                        animateCSS(cart, 'fadeOutLeft').then((message) => {
                            cart.classList.add('hidden');
                        });
                        let data = localStorage.getItem('carts_data');
                        let result_data = [];
                        if (data) {
                            let items = JSON.parse(data);
                            items.forEach(item => {
                                if (item.id !== cart.dataset.id) {
                                    result_data.push(item);
                                }
                            });
                        }
                        localStorage.setItem('carts_data', JSON.stringify(result_data));
                        window.axios({
                            method: 'delete',
                            url: host + 'remove-cart/' + cart.dataset.id,
                        }).then(function (response) {
                        }).catch(function (error) {
                        }).then(function () { });
                    }
                });
            });
        });
    });
}
const update_result = () => {
    let price_all = 0;
    let all_carts = document.querySelectorAll('div.cart-shoping');
    all_carts.forEach(cart => {
        let number = cart.querySelector('span.number');
        if (number) {
            let price_string = cart.dataset.price;
            if (price_string) {
                price_all += parseFloat(number.innerHTML) * parseFloat(price_string);
            }
        }
    });
    if (box_buttons_pay) {
        if (!price_all) {
            box_buttons_pay.classList.add('hidden');
        }
        else {
            box_buttons_pay.classList.remove('hidden');
        }
    }
    let result_price = price_all;
    if (price_results[0].dataset.minprice > price_all) {
        result_price += parseInt(price_results[0].dataset.sendprice);
        show_free_sends.forEach(show_free_send => {
            show_free_send.classList.add('hidden');
        });
        show_price_sends.forEach(show_price_send => {
            show_price_send.classList.remove('hidden');
        });
    }
    else {
        show_free_sends.forEach(show_free_send => {
            show_free_send.classList.remove('hidden');
        });
        show_price_sends.forEach(show_price_send => {
            show_price_send.classList.add('hidden');
        });
    }
    all_price_cart_results.forEach(all_price_cart_result => {
        all_price_cart_result.innerHTML = price(price_all);
    });
    price_results.forEach(price_result => {
        price_result.innerHTML = price(result_price);
    });
};
const online_pay = document.querySelector('button.pay-online');
if (online_pay) {
    online_pay.addEventListener('click', () => {
        let carts = document.querySelectorAll('div.cart-shoping');
        let loader = online_pay.querySelector('svg');
        if (loader) {
            return false;
        }
        let span = online_pay.children[0];
        if (span) {
            span.innerHTML = tailwind_loader;
        }
        let data = [];
        carts.forEach(cart => {
            let number = cart.querySelector('span.number');
            if (number) {
                if (number.innerHTML.trim() !== '0')
                    data.push({ id: cart.id, count: number.innerHTML.trim() });
            }
        });
        window.axios({
            method: 'post',
            data: { data: data },
            url: host + 'set-location',
        }).then(function (response) {
            if (response.data) {
                window.location.href = host + 'order-set-location/' + response.data;
            }
        });
    });
}
const pay_atm = document.querySelector('button.pay-atm');
if (pay_atm) {
    pay_atm.addEventListener('click', () => {
        let carts = document.querySelectorAll('div.cart-shoping');
        let loader = pay_atm.querySelector('svg');
        if (loader) {
            return false;
        }
        let span = pay_atm.children[0];
        if (span) {
            span.innerHTML = tailwind_loader;
        }
        let data = [];
        carts.forEach(cart => {
            let number = cart.querySelector('span.number');
            if (number) {
                if (number.innerHTML.trim() !== '0')
                    data.push({ id: cart.id, count: number.innerHTML.trim() });
            }
        });
        window.axios({
            method: 'post',
            data: { data: data, invoice: 1 },
            url: host + 'set-location',
        }).then(function (response) {
            if (response.data) {
                window.location.href = host + 'order-set-location/' + response.data;
            }
        });
    });
}
const pay_wallet = document.querySelector('button.pay-wallet');
if (pay_wallet) {
    pay_wallet.addEventListener('click', () => {
        let carts = document.querySelectorAll('div.cart-shoping');
        let loader = pay_wallet.querySelector('svg');
        if (loader) {
            return false;
        }
        let span = pay_wallet.children[0];
        if (span) {
            span.innerHTML = tailwind_loader;
        }
        let data = [];
        carts.forEach(cart => {
            let number = cart.querySelector('span.number');
            if (number) {
                if (number.innerHTML.trim() !== '0')
                    data.push({ id: cart.id, count: number.innerHTML.trim() });
            }
        });
        window.axios({
            method: 'post',
            data: { data: data, wallet: 1 },
            url: host + 'set-location',
        }).then(function (response) {
            if (response.data) {
                window.location.href = host + 'order-set-location/' + response.data;
            }
        }).catch(function (error) {
            polipop.add({
                content: 'موجودی شما کافی نیست',
                title: 'ارور',
                type: 'error',
            });
            span.innerHTML = 'پرداخت از کیف پول';
        }).then(function () { });
    });
}
const map_div = document.querySelector('div.disable-map');
const onHashCh = () => {
    var _a, _b;
    let hash_string = window.location.hash.substring(1);
    if (hash_string === 'map' && map_div) {
        map_div.classList.add('show-map');
        map_div.classList.remove('disable-map');
        document.body.style.overflow = "hidden";
        let accept_location = document.querySelector('span.accept-location');
        let div_full = document.querySelector('a.div-full');
        if (div_full && accept_location) {
            div_full.classList.add('hidden');
            accept_location.classList.remove('hidden');
        }
        map_div.classList.add('z-50');
        map_div.classList.remove('z-10');
        if (button_navbar) {
            (_a = button_navbar.parentNode) === null || _a === void 0 ? void 0 : _a.classList.add('hidden');
        }
        window.reloadMap();
    }
    else if (hash_string === 'navbar') {
        if (item_navbar_circle && button_navbar) {
            let icon = button_navbar.querySelector('i');
            if (icon && navbar_can_open_or_no && icon.classList.contains('fa-bars')) {
                items_navbar_box.forEach(item_navbar_box => {
                    animateCSS(item_navbar_box, 'fadeInRight');
                    item_navbar_box.classList.remove('hidden');
                });
                animateCSS(item_navbar_circle, 'fadeInDown');
                item_navbar_circle.classList.remove('hidden');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
                icon.classList.remove('text-2xl');
                icon.classList.add('text-3xl');
                navbar_can_open_or_no = false;
                setTimeout(() => { navbar_can_open_or_no = true; }, 1100);
            }
        }
    }
    else if (!hash_string) {
        if (map_div) {
            map_div.classList.add('disable-map');
            map_div.classList.remove('show-map');
            map_div.classList.remove('z-50');
            map_div.classList.add('z-10');
            document.body.style.overflow = "auto";
            if (button_navbar) {
                (_b = button_navbar.parentNode) === null || _b === void 0 ? void 0 : _b.classList.remove('hidden');
            }
            let accept_location = document.querySelector('span.accept-location');
            let div_full = document.querySelector('a.div-full');
            if (div_full && accept_location) {
                div_full.classList.remove('hidden');
                accept_location.classList.add('hidden');
            }
            window.reloadMap();
        }
        if (item_navbar_circle && button_navbar) {
            let icon = button_navbar.querySelector('i');
            if (icon && navbar_can_open_or_no && icon.classList.contains('fa-times')) {
                items_navbar_box.forEach(item_navbar_box => {
                    animateCSS(item_navbar_box, 'fadeOutRight').then((message) => {
                        item_navbar_box.classList.add('hidden');
                    });
                });
                animateCSS(item_navbar_circle, 'fadeOutUp').then((message) => {
                    item_navbar_circle.classList.add('hidden');
                });
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
                icon.classList.add('text-2xl');
                icon.classList.remove('text-3xl');
                navbar_can_open_or_no = false;
                setTimeout(() => { navbar_can_open_or_no = true; }, 1100);
            }
        }
    }
};
// function_onchange();
window.addEventListener('hashchange', onHashCh);
onHashCh();
const send_courier_button = document.querySelector('div.send-courier');
const send_courier_form = document.querySelector('form.send-courier');
const send_post_button = document.querySelector('div.send-post');
const send_post_form = document.querySelector('form.send-post');
const send_post_function = () => {
    if (send_courier_button && send_courier_form && send_post_button && send_post_form) {
        send_post_form.classList.remove('h-0');
        send_post_form.classList.add('h-auto');
        send_courier_form.classList.add('h-0');
        send_courier_form.classList.remove('h-auto');
    }
};
const send_courier_function = () => {
    if (send_courier_button && send_courier_form && send_post_button && send_post_form) {
        send_post_form.classList.add('h-0');
        send_post_form.classList.remove('h-auto');
        send_courier_form.classList.remove('h-0');
        send_courier_form.classList.add('h-auto');
    }
};
if (send_courier_button && send_courier_form && send_post_button && send_post_form) {
    send_post_button.addEventListener('click', send_post_function);
    send_courier_button.addEventListener('click', send_courier_function);
}
const inputs_plate = document.querySelectorAll('input[name=plate]');
const inputs_address = document.querySelectorAll('input[name=address]');
const inputs_unit = document.querySelectorAll('input[name=unit]');
const input_postal_code = document.querySelector('input[name=postal_code]');
var prev_value_input_postal_code = '';
let array_url = current_url.split('/');
const order_id = array_url[array_url.length - 1];
if (input_postal_code) {
    input_postal_code.addEventListener('keyup', () => {
        window.axios({
            method: 'post',
            url: host + 'change-postal-code/' + order_id + '/' + input_postal_code.value,
        }).then(function (response) {
        }).catch(function (error) {
            window.axios({
                method: 'get',
                url: host + 'get-user-info',
            }).then(function (res) {
                let response = res.data;
                if (input_postal_code) {
                    input_postal_code.value = response.postal_code;
                }
            }).catch(function (error) {
            }).then(function () { });
        }).then(function () { });
    });
}
inputs_unit.forEach(input_unit => {
    input_unit.addEventListener('keyup', () => {
        let text = input_unit.value;
        inputs_unit.forEach(input_unit => {
            input_unit.value = text;
        });
        window.axios({
            method: 'post',
            url: host + 'change-unit/' + window.id + '/' + (text ? text : '0'),
        }).then(function (response) {
        }).catch(function (error) {
        }).then(function () { });
    });
});
inputs_plate.forEach(input_plate => {
    input_plate.addEventListener('keyup', () => {
        let text = input_plate.value;
        inputs_plate.forEach(input_plate => {
            input_plate.value = text;
        });
        window.axios({
            method: 'post',
            url: host + 'change-plate/' + window.id + '/' + (text ? text : '0'),
        }).then(function (response) {
        }).catch(function (error) {
        }).then(function () { });
    });
});
window.axios({
    method: 'get',
    url: host + 'get-user-info',
}).then(function (res) {
    let response = res.data;
    inputs_unit.forEach(input_unit => {
        if (!input_unit.value && parseInt(response.unit))
            input_unit.value = response.unit;
    });
    inputs_plate.forEach(input_plate => {
        if (!input_plate.value && parseInt(response.plate))
            input_plate.value = response.plate;
    });
    inputs_address.forEach(input_address => {
        if (!input_address.value && response.address)
            input_address.value = response.address;
    });
    if (input_postal_code) {
        if (!input_postal_code.value)
            input_postal_code.value = response.postal_code;
    }
}).catch(function (error) {
}).then(function () { });
const forms = document.querySelectorAll('form');
const submits_input = document.querySelectorAll("button.submit");
submits_input.forEach(submit_input => {
    submit_input.addEventListener('click', () => {
        let icon = submit_input.querySelector('i');
        if (!icon) {
            submit_input.innerHTML = `
            <i class="fa text-center fa-cog fa-spin fa-2x fa-fw"></i>
            `;
            forms.forEach(form => {
                if (form.querySelector("button.submit") == submit_input) {
                    form.submit();
                }
            });
        }
    });
});
const input_send_courier = document.querySelector('input[type~=radio].send-courier');
const input_send_post = document.querySelector('input[type~=radio].send-post');
if (input_send_post && input_send_courier) {
    if (input_send_post.checked) {
        send_post_function();
    }
    else if (input_send_courier.checked) {
        send_courier_function();
    }
}
window.axios({
    method: 'get',
    url: host + 'get-wallet',
}).then(function (res) {
    let wallets = document.querySelectorAll('p.wallet-show');
    wallets.forEach(wallet => {
        wallet.innerHTML = price(parseInt(res.data));
    });
}).catch(function (error) {
}).then(function () { });
const text_price_trenslate = document.querySelector('p.price-trenslate');
const input_inventory_increase = document.querySelector('input.inventory-increase');
if (text_price_trenslate && input_inventory_increase) {
    const function_inventory_increase_translate = () => {
        text_price_trenslate.innerHTML = price(parseInt(input_inventory_increase.value));
    };
    input_inventory_increase.addEventListener('keyup', function_inventory_increase_translate);
    input_inventory_increase.addEventListener('change', function_inventory_increase_translate);
    function_inventory_increase_translate();
    window.function_inventory_increase_translate = () => { function_inventory_increase_translate(); };
}
const order_divs = document.querySelectorAll('div.order-div');
order_divs.forEach(order_div => {
    let button_cancel = order_div.querySelector('button.cancel-order');
    let button_remove = order_div.querySelector('button.remove-order');
    button_cancel === null || button_cancel === void 0 ? void 0 : button_cancel.addEventListener('click', () => {
        myConfirm({
            text: 'آیا از لغو این سفارش مطمئنید ؟',
            fn: () => {
                animateCSS(order_div, 'fadeOutLeft').then((message) => {
                    order_div.classList.add('hidden');
                });
                window.axios({
                    method: 'post',
                    url: host + 'cancel-order/' + order_div.id,
                }).then(function (res) {
                }).catch(function (error) {
                }).then(function () { });
            }
        });
    });
    button_remove === null || button_remove === void 0 ? void 0 : button_remove.addEventListener('click', () => {
        myConfirm({
            text: 'آیا از مرجوعی سفارش مطمئنید ؟ <br> <span class="sm:text-lg text-base text-green-600"> درصورت مرجوعی مبلغ پرداختی شما به کیف پول شما افزوده میشود </span>',
            fn: () => {
                animateCSS(order_div, 'fadeOutLeft').then((message) => {
                    order_div.classList.add('hidden');
                });
                window.axios({
                    method: 'post',
                    url: host + 'reject-order/' + order_div.id,
                }).then(function (res) {
                    window.axios({
                        method: 'get',
                        url: host + 'get-wallet',
                    }).then(function (res) {
                        let wallets = document.querySelectorAll('p.wallet-show');
                        wallets.forEach(wallet => {
                            wallet.innerHTML = price(parseInt(res.data));
                        });
                    }).catch(function (error) {
                    }).then(function () { });
                }).catch(function (error) {
                }).then(function () { });
            }
        });
    });
});
const login_links = document.querySelectorAll('a[href~="/login"]');
const register_links = document.querySelectorAll('a[href~="/register"]');
login_links.forEach(login_link => {
    login_link.addEventListener('click', () => {
        localStorage.setItem('redirect', current_url);
    });
});
register_links.forEach(register_link => {
    register_link.addEventListener('click', () => {
        localStorage.setItem('redirect', current_url);
    });
});
let itemsShouldRemove = ["div.leaflet-bottom.leaflet-right", 'a[href*="neshan.org"]', 'a[href*="openstreetmap.org"]'];
window.addEventListener('load', () => {
    setInterval(() => {
        itemsShouldRemove.forEach(itemShouldRemove => {
            let selector = itemShouldRemove;
            let fatherEl = "";
            if (selector.includes(">")) {
                let toArray = selector.split(">");
                selector = toArray[1].trim();
                fatherEl = toArray[0].trim();
            }
            document.querySelectorAll(selector).forEach(el => {
                if (fatherEl) {
                    const parent = el.closest(fatherEl);
                    if (parent)
                        parent.remove();
                }
                else {
                    el.remove();
                }
            });
        });
    }, 1000);
});
