<script setup>

</script>
<template>
  <div class="col-5 align-items-center">
    <div class="mb-1 bg-white">
      <div class="w-auto d-flex align-items-center flex-column mx-2">
        <div class="m-2">個人資料</div>
      </div>
      <div class="w-auto d-flex align-items-center flex-column border-top mx-2 pb-2">
        <div>圖片</div>
        <div></div>
        <div >
         
        </div>
        <div >可以新增個人簡介~~</div>
      </div>
    </div>
    <div class="mb-1 bg-white">
      <div class="w-auto d-flex align-items-center flex-column mx-2">
        <div class="m-2">資料修改</div>
      </div>
      <div class="w-auto d-flex align-items-center flex-column border-top mx-2">
        <div>圖片</div>
        <div class="m-2">使用者名稱</div>
        <!-- Edit Data -->
        <form class="w-100 px-3">
          <div class="d-flex justify-content-center align-items-center py-2">
            <label for="inputAccount" class="d-flex col-3">帳號名</label>
            <input type="text" class="form-control" id="inputAccount"  />
          </div>
          <div class="d-flex align-items-center py-2">
            <label for="inputPassword" class="d-flex col-3">信箱</label>
            <input type="text" class="form-control" id="inputPassword" />
          </div>
          <div class="d-flex align-items-center py-2">
            <label for="inputPassword" class="d-flex col-3">個人簡介</label>
            <textarea
              type="password"
              class="form-control"
              id="inputPassword"
             
            ></textarea>
          </div>
          <div class="d-flex align-items-center py-2">
            <label for="inputPassword" class="d-flex col-3">密碼</label>
            <input type="password" class="form-control" id="inputPassword" />
          </div>
          <div class="d-flex align-items-center py-2">
            <label for="inputPassword" class="d-flex col-3">再次密碼</label>
            <input
              type="password"
              class="form-control"
              id="inputPassword"
             
            />
          </div>
          <div class="d-flex justify-content-evenly align-items-center py-3">
            <div>
              <a
                class="text-primary text-decoration-none" href="/userProfile"
              >
                取消
              </a>
            </div>
            <button type="submit" class="btn btn-primary px-5">儲存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
