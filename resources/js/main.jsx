import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import DashboardLayout from "./admin-panel/pages/dashboardLayout";
import Index from "./admin-panel/pages/Index";
import Pendidikan from "./admin-panel/pages/pendidikan";
import Dakwah from "./admin-panel/pages/dakwah";
import Kaderisasi from "./admin-panel/pages/Kaderisasi";
import Jamiyyah from "./admin-panel/pages/Jamiyyah";
import Sosial from "./admin-panel/pages/Sosial";

ReactDOM.createRoot(document.getElementById("app")).render(
    <BrowserRouter>
        <Routes>
            <Route path="/admin-panel" element={<DashboardLayout />}>
                <Route index element={<Index />} />
                <Route path="pendidikan" element={<Pendidikan />} />
                <Route path="dakwah" element={<Dakwah />} />
                <Route path="kaderisasi" element={<Kaderisasi />} />
                <Route path="jamiyyah" element={<Jamiyyah />} />
                <Route path="sosial" element={<Sosial />} />
            </Route>
        </Routes>
    </BrowserRouter>
);
