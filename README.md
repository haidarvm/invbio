# Task List
- change logo **done**
- bug shorting date on stock should use update_at ... `progress`
1. Menu update stock:  **done**
Tab: stock in, stock out, multiple in, multiple out
Pas menu stock out ada info: qty dan location. Sekalian alert kalau qty kurang dari 5pcs
- bugs on script.js if no datepicker ... progress check
- Features multiple in/out .. `progress`
- Tampilan ramah tablet 10 inch ... `progress`
- export files with filename & title (unknown table stock) ... `progress`
- bug stock all filter date
- menu active by url
- Item Image upload
- Home menu with big cards button
- Login Authentication  admin, operator ... **done**

# chart using highcharts stock line
- chart perbarang gabungan stock in stock out
- chart gabungan stock in stock out
- chart stock in chart
- chart stock out chart
- deletion stock in / out
- transaction commit, rollback on insert, edit, delete stock in / out

# client request
- Login UAL : admin, operator **done**
- Stock alert if threshold config

# new task for deletion stock in / out
if delete stock in  
table stock decrement qty from stock in by stock_id
if delete stock out
table stock increment qty from stock out by stock_id

# **done**
- Rubah/Update table tambah kolom lokasi rak ... **done**
- Report ramah print/pdf ... **done**
- detail nama barang + lokasi rak ... **done**
- report with date from to ... **done** hard
- Master CRUD employee ... **done**
- Master CRUD ITEM  ... **done**
- Custom report ada features filter ... **done**
- add Description / Keterangan .. **done**
- add desc .. **done**
# EDIT STOCK IN / OUT Task **done**
- kalau edit di stock maka list semua stok in & out per item itu
- kalau edit stock in / out maka update lalu update juga di table stok cara nya :
    stock in 20 (edit jadi 18)
    stock out 5 (edit jadi 3)
    maka stock = 15
    # if edit Stock out
    -5 + -3
    decrement dulu value sebelum nya lalu decrement value baru

    # if edit Stock in
    decrement dulu value sebelum nya lalu increment value baru


return $this->where($item)->increment('quantity', $quantity);

# android kotlin webview
https://camposha.info/android-examples/android-webview/#gsc.tab=0

# sample playground autocomplete
https://codepen.io/tarekraafat/embed/rQopdW?height=265&theme-id=dark&default-tab=js,result#result-box

# Multiple Auto select example
https://jsfiddle.net/tarekraafat/6p5j4Lzh/2/
https://github.com/TarekRaafat/autoComplete.js/issues/82