import test from './myAlpin';

document.addEventListener("alpine:init", () => {
    Alpine.data("collapse", () => ({
        collapse: false,

        collapseSidebar() {
            this.collapse = !this.collapse;
        },
    }));
    Alpine.data("dropdown", (initialOpenState = false) => ({
        open: initialOpenState,

        toggle() {
            this.open = !this.open;
        }
    }));
    Alpine.data("modals", (initialOpenState = false) => ({
        open: initialOpenState,

        toggle() {
            this.open = !this.open;
        },
    }));

    test();

    // main - custom functions
    Alpine.data("main", (value) => ({
        sendData(phone) {
            // console.log(phone);
        }
    }));

    Alpine.store("app", {
        // sidebar
        sidebar: false,
        toggleSidebar() {
            this.sidebar = !this.sidebar;
        }
    });

    // mystore
    Alpine.store("mystore", {

        editing: '010',
        actions(data) {
            console.log(data);

            return data + this.editing;

        }
    });
});
