import Owners from "./components/Owners.vue";
import Addresses from "./components/Addresses.vue";
import Cars from "./components/Cars.vue";
import CarDetail from "./components/CarDetail.vue";
import CarEdit from "./components/CarEdit.vue";
import OwnerDetail from "./components/OwnerDetail.vue";
import OwnerEdit from "./components/OwnerEdit.vue";
import AddressDetail from "./components/AddressDetail.vue";
import AddressEdit from "./components/AddressEdit.vue";

export const routes = [
    {
        name: "owners",
        path: "/owners",
        component: Owners
    },
    {
        name: "addresses",
        path: "/addresses",
        component: Addresses
    },
    {
        name: "cars",
        path: "/cars",
        component: Cars
    },

    {
        name: "carDetail",
        path: "/car-details/:id",
        component: CarDetail
    },

    {
        name: "carEdit",
        path: "/car-edit/:id",
        component: CarEdit
    },

    {
        name: "ownerDetail",
        path: "/owner-details/:id",
        component: OwnerDetail
    },

    {
        name: "ownerEdit",
        path: "/owner-edit/:id",
        component: OwnerEdit
    },

    {
        name: "addressDetail",
        path: "/address-details/:id",
        component: AddressDetail
    },

    {
        name: "addressEdit",
        path: "/address-edit/:id",
        component: AddressEdit
    }
];
