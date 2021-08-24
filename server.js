const express = require('express')
const { writeFileSync, readFileSync } = require('fs')

const app = express()
app.use(require('cors')())
app.use(require("body-parser").json());
app.post('/' , (req, response) => {


   const { isim, soyisim, bolum, no, not, tarih} = req.body


   const jsonb = readFileSync('./js/veri.json')

   let ogrenciler = JSON.parse(jsonb)
   

   ogrenciler.ogrenciler .push({
       id :   ogrenciler.ogrenciler.length,
       isim, soyisim, bolum, no, not, tarih
   })

   writeFileSync('./js/veri.json', JSON.stringify(ogrenciler), "utf8")



   response.end()
})


app.post('/sil', (req, res) => {
    const jsonb = readFileSync('./js/veri.json')

    console.log(req.body)

    let ogrenciler = JSON.parse(jsonb)

    ogrenciler.ogrenciler = ogrenciler.ogrenciler.filter( x => x.no != req.body.id)

    writeFileSync('./js/veri.json', JSON.stringify(ogrenciler), "utf8")

    res.end(JSON.stringify(  ogrenciler))
})

app.listen(3301)