<template>
  <div class="hello" style="position:relative; bottom:60px">
    <br><hr>
    <center><br>
    <router-link to="/sepatu">
    <button type="button" class="btn btn-md btn-danger" style="position:relative; bottom:10px; right:390px;">Back</button>
    </router-link>
    <h2><b>Tambah/Edit Data Sepatu</b></h2><br>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Sepatu </label></td>
        <td><input type="text" v-model="sepatu.nama_sepatu"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Ukuran Sepatu </label></td>
        <td><input type="text"  v-model="sepatu.ukuran_sepatu" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Warna Sepatu </label></td>
        <td><input type="text" v-model="sepatu.warna_sepatu" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Stok </label></td>
        <td><input type="number" v-model="sepatu.stok" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-success" style="position:relative; left:360px;">Save</button>
    </form>
    </center><hr>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'sepatuForm',
  data () {
    return {
      sepatu: {
        id: null,
        nama_sepatu: '',
        ukuran_sepatu: '',
        warna_sepatu: '',
        stok: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost/studikasusUAS/public/sepatu/'
      api.get(url + id).then(res => {
        this.sepatu = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.sepatu
      let url = 'http://localhost/studikasusUAS/public/sepatu'

      if (this.sepatu.id) {
        url += '/' + this.sepatu.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/sepatu')
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
