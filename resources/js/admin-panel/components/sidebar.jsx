import React, { useState } from "react";
import { ChevronDown, ChevronRight } from "lucide-react";

export default function SidebarItem({ item }) {
    const [open, setOpen] = useState(false);

    return (
        <div>
            <button
                onClick={() => (item.children ? setOpen(!open) : null)}
                className="flex items-center justify-between w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700"
            >
                <span>{item.title}</span>
                {item.children &&
                    (open ? (
                        <ChevronDown size={16} />
                    ) : (
                        <ChevronRight size={16} />
                    ))}
            </button>
            {item.children && open && (
                <div className="ml-4">
                    {item.children.map((child, index) => (
                        <a
                            key={index}
                            href={child.href}
                            className="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800"
                        >
                            {child.title}
                        </a>
                    ))}
                </div>
            )}
        </div>
    );
}
