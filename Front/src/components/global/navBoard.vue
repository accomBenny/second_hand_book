<!-- <script setup>
  import { storeToRefs } from 'pinia';
  import { userDataStore } from '../../stores/user';
  const userData = userStore()
  const {user} = storeToRefs(userData)
</script> -->
<template>
    <nav class="navbar navbar-expand-lg navbar-light  bg-dark p-3 ">
      <div class="container-fluid">
        <router-link class="navbar-brand text-light" to="/about">CMRDB-Board</router-link>
        <button class="btn bg-success text-light " data-bs-toggle="modal" data-bs-target="#loginBox" >登入/註冊</button>
      </div>
    </nav>
    <div
    id="loginBox"
    aria-hidden="true">
      <div class="bg-info">123</div>
    </div>
    <div class="d-flex justify-content-between align-items-center" >
      <button
        class="btn btn-light mx-4"
        data-bs-toggle="modal"
        data-bs-target="#loginModalUI"
        aria-hidden="true"
      >
        登入 / 註冊
      </button>
    </div>
    <div
    class="modal fade"
    id="loginModalUI"
    tabindex="-1"
    aria-labelledby="loginModalLabelUI"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <form >
          <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="loginModalLabel">登入</h5>
          </div>
          <div class="d-flex justify-content-center align-items-center py-2">
            <label for="inputAccount" class="d-flex col-3 justify-content-center">帳號名</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputAccount" />
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center py-2">
            <label for="inputPassword" class="d-flex col-3 justify-content-center">密碼</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="inputPassword" />
            </div>
          </div>
          <div class="d-flex justify-content-evenly align-items-center py-3">
            <a
              class="text-primary text-decoration-none"
              data-bs-target="#registerModalUI"
              data-bs-toggle="modal"
            >
              尚未有帳戶?
            </a>
            <button type="submit" class="btn btn-primary px-5" data-bs-dismiss="modal">登入</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>