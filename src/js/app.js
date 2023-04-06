import {bonesMsg} from "./modules/bones";
import '@bayfrontmedia/skin/dist/skin.min';

window.addEventListener("load", () => {
    Skin.App.init();
    console.log(bonesMsg());
});