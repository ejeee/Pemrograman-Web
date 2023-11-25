//Get the Element
var inputContentActivityEl = $("#activityContent");
var btnAddActivityEl = $("#addActivity");
var listActivitiesEl = $("#listActivity");

var list_activities = []; //menyimpan daftar

btnAddActivityEl.on("click", function (e) {
  var activity = {
    content: inputContentActivityEl.val(), //memasukkan teks
    done: false,
  };

  list_activities.push(activity); //elemen bentuk daftar

  setActivityHtml(activity, list_activities.length - 1);

  e.preventDefault();
});

var setActivityHtml = function (activity, index) {
  var html = `<li class="list-group-item d-flex justify-content-between align-items-center">
                  <p id="activity-${index}">${activity.content}</p>
                  <div class="text-center">
                    <button class="btn btn-success my-2" onClick="checkActivity(this)">
                      <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-warning my-2" onClick="editActivity(${index})">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger my-2" onClick="deleteActivity(${index}, this)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </li>`;
  listActivitiesEl.append(html);
};

var editActivity = function (index) {
  //edit berdasar index
  var itemText = list_activities[index].content;
  var itemElement = $(`#activity-${index}`); //ambil elemen html dengan id

  var editField = document.createElement("input"); //input baru
  editField.type = "text";
  editField.value = itemText;

  // mengganti teks dengan kolom input
  itemElement.html(editField);

  var saveButton = document.createElement("button");
  saveButton.innerHTML = "Save";
  saveButton.className = "btn btn-success my-2";
  saveButton.addEventListener("click", function () {
    list_activities[index].content = editField.value;
    itemElement.html(editField.value);
  });

  // menambahkan
  itemElement.append(saveButton);
};

var checkActivity = function (btnEl) {
  //menandai sudah/belum
  toggleCheckButton(btnEl);
};

var toggleCheckButton = function (btnEl) {
  var el = $(btnEl);

  if (el.hasClass("btn-success")) {
    el.removeClass("btn-success");
    el.addClass("btn-warning");
    el.children("i").removeClass();
    el.children("i").addClass("fas fa-undo");
    el.parent().siblings("p").css("text-decoration", "line-through");
  } else {
    el.removeClass("btn-warning");
    el.addClass("btn-success");
    el.children("i").removeClass();
    el.children("i").addClass("fa fa-check");
    el.parent().siblings("p").css("text-decoration", "unset");
  }
};

var deleteActivity = function (index, btnDeleteEl) {
  var el = $(btnDeleteEl);
  el.parent().parent("li").remove();

  //remove activity dari list_activities array melalui index number
  list_activities.splice(index, 1);
};
