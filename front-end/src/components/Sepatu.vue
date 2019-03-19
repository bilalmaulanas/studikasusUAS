<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center>
        <br><hr>
    <h1>Data sepatu</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:265px;">Back</button>
    </router-link>
    <router-link to="/sepatu/create">
    <button type="button" class="btn btn-sm btn-primary" style="position:relative; bottom:10px; right:262px;">Tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" ><center>
      <tr>
        <th>No</th>
        <th>Nama sepatu</th>
        <th>Ukuran sepatu</th>
        <th>Warna sepatu</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(sepatu, i) in data_sepatu" :key="i">
          <td>{{ i + 1 }}.</td>
          <td>{{ sepatu.nama_sepatu }}</td>
          <td>{{ sepatu.ukuran_sepatu }}</td>
          <td>{{ sepatu.warna_sepatu }}</td>
          <td>{{ sepatu.stok }}</td>
          <td>
            <router-link :to="'/sepatu/' + sepatu.id"><button type="button" class="btn btn-sm btn-primary">Edit</button></router-link>
             | <button @click="deleteRow(sepatu.id)" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr></center>
    </table><br><hr>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Sepatu',
  data () {
    return {
      data_sepatu: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost/studikasusUAS/public/'
      let url2 = 'sepatu'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_sepatu = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost/studikasusUAS/public/sepatu/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
