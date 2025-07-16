"use strict";

/*============================================ 
======== Table of JS Functions =========
============================================*/

document.addEventListener("DOMContentLoaded", function () {
  /*
===============================================================
=> Reusable Functions Start
===============================================================
  */
  // modal toggle function
  function modalToggle(modalName, modalBox, open, close) {
    modalName.addEventListener("click", () => {
      if (modalBox.classList.contains(open)) {
        modalBox.classList.remove(open);
        modalBox.classList.add(close);
        document.removeEventListener("click", closeDropdownOutside);
      } else {
        modalBox.classList.add(open);
        modalBox.classList.remove(close);
        document.addEventListener("click", closeDropdownOutside);
      }

      function closeDropdownOutside(event) {
        const isClickedInsideDropdown = modalBox.contains(event.target);
        const isClickedOnDropdownBtn = modalName.contains(event.target);

        if (!isClickedInsideDropdown && !isClickedOnDropdownBtn) {
          modalBox.classList.add(close);
          modalBox.classList.remove(open);
          document.removeEventListener("click", closeDropdownOutside);
        }
      }
    });
  }

  //select active item
  function selectOneItem(items) {
    if (items) {
      const item = items.querySelectorAll(".item");

      item.forEach((e) =>
        e.addEventListener("click", () => {
          if (!e.classList.contains("active")) {
            items.querySelector(".active").classList.remove("active");

            e.classList.add("active");
          }
        })
      );
    }
  }

  //select item from modal
  function selectItemFromModal(items, modalBox, slectText) {
    items.forEach((e) =>
      e.addEventListener("click", () => {
        modalBox.classList.remove("modalClose");
        modalBox.classList.add("modalOpen");
        slectText.innerHTML = e.textContent;
      })
    );
  }

  // Modal with different open and close button
  function modalDiffOpenClose(
    modalClass,
    modalOpenButtonClass,
    modalCloseButtonClass,
    closeModalClass,
    openModalClass
  ) {
    const modal = document.querySelector(`.${modalClass}`);
    const modalOpenButton = document.querySelector(`.${modalOpenButtonClass}`);
    const modalCloseButton = document.querySelector(
      `.${modalCloseButtonClass}`
    );
    modal &&
      modalOpenButton.addEventListener("click", () => {
        modal.classList.remove(closeModalClass);
        modal.classList.add(openModalClass);
      });

    modal &&
      modalCloseButton.addEventListener("click", () => {
        modal.classList.remove(openModalClass);
        modal.classList.add(closeModalClass);
      });
  }

  // Select One From Maney Item
  function selectItemFromMany(
    parentClass,
    itemClass,
    activeItemStyle,
    inactiveItemStye
  ) {
    const selectParentClass = document.querySelector(`.${parentClass}`);
    const items = selectParentClass?.querySelectorAll(`.${itemClass}`);

    selectParentClass &&
      items.forEach((e) => {
        e.addEventListener("click", () => {
          const activeItem = selectParentClass.querySelector(
            `.${activeItemStyle}`
          );

          const inactiveItem = e.querySelector(`.${inactiveItemStye}`);

          if (inactiveItem) {
            activeItem.classList.remove(activeItemStyle);
            activeItem.classList.add(inactiveItemStye);

            inactiveItem.classList.remove(inactiveItemStye);
            inactiveItem.classList.add(activeItemStyle);
          }
        });
      });
  }

  // Select One Item From Many
  function selectOneItem(items) {
    if (items) {
      const item = items.querySelectorAll(".item");

      item.forEach((e) =>
        e.addEventListener("click", () => {
          if (!e.classList.contains("active")) {
            items.querySelector(".active").classList.remove("active");

            e.classList.add("active");
          }
        })
      );
    }
  }

  function showPasswordFunc(item, passField) {
    item.addEventListener("click", () => {
      if (item.classList.contains("ph-eye-slash")) {
        item.classList.add("ph-eye");
        item.classList.remove("ph-eye-slash");
        passField.setAttribute("type", "text");
      } else {
        item.classList.remove("ph-eye");
        item.classList.add("ph-eye-slash");
        passField.setAttribute("type", "password");
      }
    });
  }

  //create Tab
  function createTab(
    tabArea,
    activeTabButtonClass,
    activeTabClass,
    hiddenTabClass,
    tabButtonClass,
    tabContentClass
  ) {
    const tabButtons = document.querySelectorAll(`.${tabButtonClass}`);
    const tabContent = document.querySelectorAll(`.${tabContentClass}`);

    tabButtons.forEach((e) => {
      e.addEventListener("click", () => {
        if (!e.classList.contains(activeTabClass)) {
          const activeTabButton = tabArea.querySelector(
            `.${activeTabButtonClass}`
          );
          const tabData = tabArea.querySelector(`#${e.id}_data`);

          activeTabButton.classList.remove(activeTabButtonClass);
          e.classList.add(activeTabButtonClass);

          tabArea
            .querySelector(`.${activeTabClass}`)
            .classList.remove(activeTabClass);
          //Add hiddentab class on every tab data element if the classlist doen't contain hiddentab class
          tabContent.forEach((e) => {
            if (!e.classList.contains(hiddenTabClass)) {
              e.classList.add(hiddenTabClass);
            }
          });

          tabData.classList.remove(hiddenTabClass);
          tabData.classList.add(activeTabClass);
        }
      });
    });
  }

  //active class toggle
  function activeClassToggle(itemClass) {
    const item = document.querySelector(itemClass);

    if (item) {
      item.addEventListener("click", () => {
        if (item.classList.contains("active")) {
          item.classList.remove("active");
        } else {
          item.classList.add("active");
        }
      });
    }
  }

  /*
===============================================================
=> Reusable Functions End
===============================================================
*/

  //check local storage
  const localStorageMode = localStorage.getItem("mode");
  const chooseModeButton = document.querySelector(".choose-mode");

  function changeMode(mode) {
    if (mode === "dark") {
      document.querySelector("body").classList?.remove("white");
      document.querySelector("body").classList.add("dark");
    } else {
      document.querySelector("body").classList?.remove("dark");
      document.querySelector("body").classList.add("white");
    }
  }

  if (localStorageMode === "dark") {
    changeMode(localStorageMode);

    if (chooseModeButton) {
      chooseModeButton.classList.add("active");
    }
  }

  // Light Mode Dark Mode

  chooseModeButton?.addEventListener("click", () => {
    if (localStorage.getItem("mode") === "dark") {
      localStorage.setItem("mode", "white");
      changeMode("white");
      chooseModeButton.classList.remove("active");
    } else {
      localStorage.setItem("mode", "dark");
      changeMode("dark");
      chooseModeButton.classList.add("active");
    }
  });

  //show password
  const passowordShow = document.querySelector(".passowordShow");
  const passwordField = document.querySelector(".passwordField");
  if (passowordShow) {
    showPasswordFunc(passowordShow, passwordField);
  }
  const confirmPasswordShow = document.querySelector(".confirmPasswordShow");
  const confirmPasswordField = document.querySelector(".confirmPasswordField");
  if (confirmPasswordShow) {
    showPasswordFunc(confirmPasswordShow, confirmPasswordField);
  }

  //sidebar modal
  modalDiffOpenClose(
    "sidebarModal",
    "sidebarModalOpenButton",
    "sidebarModalCloseButton",
    "hidden",
    "fixed"
  );

  //user profile tab
  const userProfileTab = document.querySelector(".userProfileTab");
  userProfileTab &&
    createTab(
      userProfileTab,
      "activeTabButton",
      "activeTab",
      "hiddenTab",
      "tabButton",
      "tab-content"
    );
  //searchContestResultTab
  const searchContestResultTab = document.querySelector(
    ".searchContestResultTab"
  );

  searchContestResultTab &&
    createTab(
      searchContestResultTab,
      "activeTabButton",
      "activeTab",
      "hiddenTab",
      "tabButton",
      "tab-content"
    );

  //quiz details
  const quizDetails = document.querySelector(".quiz-details");
  const quizDetailsShowButton = document.querySelector(
    ".quizDetailsShowButton"
  );

  quizDetailsShowButton &&
    quizDetailsShowButton.addEventListener("click", () => {
      quizDetails.classList.add("active");
    });

  const quizDetailsTab = document.querySelector(".quizDetailsTab");

  quizDetailsTab &&
    createTab(
      quizDetailsTab,
      "activeTabButton",
      "activeTab",
      "hiddenTab",
      "tabButton",
      "tab-content"
    );

  //Coonfirmation Modal
  modalDiffOpenClose(
    "confirmationModal",
    "confirmationModalOpenButton",
    "confirmationModalCloseButton",
    "hidden",
    "fixed"
  );
  modalDiffOpenClose(
    "setReminderModal",
    "setReminderModalOpenButton",
    "setReminderModalCloseButton",
    "hidden",
    "fixed"
  );

  //more option moda
  const moreOptionModalButton = document.querySelector(
    ".quizDetailsMoreOptionsModalOpenButton"
  );
  const quizDetailsMoreOptionsModal = document.querySelector(
    ".quizDetailsMoreOptionsModal"
  );

  moreOptionModalButton &&
    modalToggle(
      moreOptionModalButton,
      quizDetailsMoreOptionsModal,
      "modalOpen",
      "modalClose"
    );

  //time limit modal
  modalDiffOpenClose(
    "timeLimitModal",
    "timeLimitModalOpenButton",
    "timeLimitModalCloseButton",
    "hidden",
    "fixed"
  );
  //point modal
  modalDiffOpenClose(
    "quizPointModal",
    "quizPointModalOpenButton",
    "quizPointModalCloseButton",
    "hidden",
    "fixed"
  );
  //point modal
  modalDiffOpenClose(
    "addOptionModal",
    "addOptionModalOpenButton",
    "addOptionModalCloseButton",
    "hidden",
    "fixed"
  );

  //withdraw modal
  modalDiffOpenClose(
    "withdrawModal",
    "withdrawModalOpenButton",
    "withdrawModalCloseButton",
    "hidden",
    "fixed"
  );

  //quiz type modal
  const quizTypeModalOpenButton = document.querySelector(
    ".quizTypeModalOpenButton"
  );
  const quizTypeModal = document.querySelector(".quizTypeModal");

  quizTypeModalOpenButton &&
    modalToggle(
      quizTypeModalOpenButton,
      quizTypeModal,
      "modalOpen",
      "modalClose"
    );

  // Category Modal
  const category = document.querySelector(".category");
  const categoryModal = document.querySelector("#categoryModal");

  const sortByText = document.querySelector(".sortByText");
  const dropdownItem = document.querySelectorAll(".dropdownItem");

  category && modalToggle(category, categoryModal, "modalOpen", "modalClose");

  sortByText && selectItemFromModal(dropdownItem, categoryModal, sortByText);

  // Category Modal 2
  const category2 = document.querySelector(".category2");
  const category2Modal = document.querySelector("#category2Modal");

  const sortByText2 = document.querySelector(".sortByText2");
  const dropdownItem2 = document.querySelectorAll(".dropdownItem2");

  category2 &&
    modalToggle(category2, category2Modal, "modalOpen", "modalClose");

  sortByText2 &&
    selectItemFromModal(dropdownItem2, category2Modal, sortByText2);

  // select question number
  const selectQuestion = document.querySelector(".select-question");

  selectQuestion && selectOneItem(selectQuestion);
  // select duration
  const selectDuration = document.querySelector(".select-duration");

  selectDuration && selectOneItem(selectDuration);

  //notification toggle
  activeClassToggle(".push-notification");
  activeClassToggle(".new-followers");
  activeClassToggle(".new-likes");
  activeClassToggle(".phone-messanger");
  activeClassToggle(".payment-subscription");
  activeClassToggle(".new-tips");
  activeClassToggle(".app-update");

  // FAQ Item Toggle
  let accordion = document.querySelectorAll(".faq-accordion");

  accordion.forEach((item, index) => {
    accordion[index].addEventListener("click", function () {
      let faqAnswer = this.nextElementSibling;
      let parent = accordion[index].parentElement;

      // Close all other accordions
      accordion.forEach((otherAccordion, otherIndex) => {
        if (otherIndex !== index) {
          let otherFaqAnswer = otherAccordion.nextElementSibling;
          otherFaqAnswer.style.height = null;
          otherAccordion.querySelector("i").classList.remove("text-p1");
          otherAccordion.parentElement.classList.remove("!border-p1");
        }
      });

      // Toggle open/close for the clicked accordion
      if (faqAnswer.style.height) {
        faqAnswer.style.height = null;
      } else {
        faqAnswer.style.height = faqAnswer.scrollHeight + "px";
      }

      accordion[index].parentElement.classList.add("!border-p1");

      // Toggle classes for the clicked accordion
      accordion[index].querySelector("i").classList.toggle("ph-caret-down");
      accordion[index].querySelector("i").classList.toggle("ph-caret-up");
      accordion[index].querySelector("i").classList.add("text-p1");
    });
  });

  // select question number
  const faqCategory = document.querySelector(".faqCategory");

  faqCategory && selectOneItem(faqCategory);

  //choose level modal
  const levelItems = document.querySelector(".levelItems");
  const hintModal = document.querySelector(".hintModal");
  const hintModalCloseButton = document.querySelector(".hintModalCloseButton");

  if (levelItems) {
    const levelSingle = levelItems.querySelectorAll(".item");
    levelSingle.forEach((item) => {
      item.addEventListener("click", () => {
        hintModal.classList.remove("hidden");
        hintModal.classList.add("fixed");
      });
    });

    hintModalCloseButton.addEventListener("click", () => {
      hintModal.classList.add("hidden");
      hintModal.classList.remove("fixed");
    });
  }
});
