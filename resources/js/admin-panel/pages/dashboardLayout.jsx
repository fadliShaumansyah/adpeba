import Header from "../components/header";
import Sidebar from "../components/sidebar";
import React, { useState } from "react";

function App() {
    const [sidebarOpen, setSidebarOpen] = useState(false);
    return (
        <div className="min-h-screen bg-gray-100">
            <Header setSidebarOpen={setSidebarOpen} />
            <Sidebar
                sidebarOpen={sidebarOpen}
                setSidebarOpen={setSidebarOpen}
            />
            <main className="p-4 sm:ml-64 pt-20">
                {" "}
                {/* Tambahkan sm:ml-64 di sini */}
                <div className="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <h1 className="text-2xl font-bold mb-4">Beranda</h1>
                    {/* Konten lainnya... */}
                </div>
            </main>
        </div>
    );
}

export default App;
