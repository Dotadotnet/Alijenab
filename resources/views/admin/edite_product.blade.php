@extends('admin.layout.main')
@section('title')
    حذف و تغییر ادمین ها
@endsection
@section('main')
    {{-- @foreach ($admins as $admin)
    {{$admin->name}}
@endforeach --}}
<style>
    table b {
        color : blue ;
        
    }
</style>
    @php
        for ($i = 0; $i < count($products); $i++) {
            $products[$i]['link'] = '/product/' . $products[$i]['id'];
        }
    @endphp
    <div>
        <input type="text" autocomplete="off" id="table-search"
            class="block p-2  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="سرچ کنید ...">
    </div>
    @component('admin.components.table', [
        'data' => $products,
        'column_name' => ['id' => 'آیدی', 'thumbnail' => 'عکس', 'name' => 'نام', 'price' => 'قیمت', 'link' => 'دیدن صحفه'],
        'table' => 'product',
    ])
    @endcomponent
    <script>
        const table_search = document.getElementById('table-search');
        const trs = document.querySelectorAll('tbody tr');

        table_search.addEventListener('keyup', () => {
            let text = table_search.value;
            let words = text.split(' ');
            trs.forEach(tr => {
                let tds = tr.children;
                console.log(tds);
                
                tds[2].innerHTML = tds[2].dataset.value;
                for (let i = 0; i < words.length; i++) {
                    const word = words[i];
                    let selected = false;
                    if (tds[2].dataset.value.includes(word)) {
                        tds[2].innerHTML = tds[2].innerHTML.replace(word, '<b>' + word + '</b>')
                        selected = true
                    }
                    if (i + 1 == words.length && !selected) {
                        tds[2].innerHTML = tds[2].dataset.value;
                    }
                }

                tds[3].innerHTML = tds[3].dataset.value;
                for (let i = 0; i < words.length; i++) {
                    const word = words[i];
                    let selected = false;
                    if (tds[3].dataset.value.includes(word)) {
                        tds[3].innerHTML = tds[3].innerHTML.replace(word, '<b>' + word + '</b>')
                        selected = true
                    }
                    if (i + 1 == words.length && !selected) {
                        tds[3].innerHTML = tds[3].dataset.value;
                    }
                }

               if (!tr.innerHTML.includes('<b>') && !tr.innerHTML.includes('</b>')) {
                    tr.classList.add('hidden')
                } else {
                    tr.classList.remove('hidden')
                }
            });
        })
    </script>
@endsection
