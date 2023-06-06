import React from "react";
import { SidebarData } from "./SidebarData.js";
import "./sidebar.css";

function Sidebar() {
  return (
    <div className="Sidebar">
      <div id="sidebar_logo">
        <img src="images/logo2.png" alt="画像の説明" />
      </div>
      <ul className="SidebarList">
        {SidebarData.map((value, key) => {
          return (
            <li
              key={key}
              id={window.location.pathname === value.link ? "active" : ""}
              className="row"
              onClick={() => {
                window.location.pathname = value.link;
              }}
            >
              <div id="icon">{value.icon}</div>
              <div className="text">
                <div id="title">{value.title}</div>
                <div id="subtitle">{value.subtitle}</div>
              </div>
            </li>
          );
        })}
      </ul>
    </div>
  );
}

export default Sidebar;
