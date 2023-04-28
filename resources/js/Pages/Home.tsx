import React, { useEffect, useRef, useState } from "react";
import Layout from "../components/Layout";
import { Link } from "@inertiajs/react";
export default function Home() {
    const [isDragging, setIsDragging] = useState<boolean>(false);
    const [startX, setStartX] = useState<number | null>(null);
    const [scrollLeft, setScrollLeft] = useState<number>(0);
    const containerRef = useRef<HTMLDivElement | null>(null);

    const handleMouseDown = (event: React.MouseEvent<HTMLDivElement>) => {
        setIsDragging(true);
        setStartX(event.pageX - containerRef.current!.offsetLeft);
        setScrollLeft(containerRef.current!.scrollLeft);
    };

    const handleMouseMove = (event: React.MouseEvent<HTMLDivElement>) => {
        if (!isDragging) return;
        event.preventDefault();
        const x = event.pageX - containerRef.current!.offsetLeft;
        const distance = x - (startX as number);
        containerRef.current!.scrollLeft = scrollLeft - distance;
    };

    const handleMouseUp = () => {
        setIsDragging(false);
    };

    return (
        <Layout>
            <div className="three_d_view">
                <div className="container" ref={containerRef}>
                    <div
                        className="three_d_view_img_list"
                        onMouseDown={handleMouseDown}
                        onMouseMove={handleMouseMove}
                        onMouseUp={handleMouseUp}
                    >
                        <Link href="/exhibitor/amref/details">
                            <img
                                className="three_d_view_img"
                                src="https://netrinoimages.s3.eu-west-2.amazonaws.com/2020/03/06/692052/296493/exhibition_stand_three_sides_open_stall_3d_model_c4d_max_obj_fbx_ma_lwo_3ds_3dm_stl_3100277_o.jpg"
                                alt=""
                                title="Scroll to view more"
                            />
                        </Link>
                        <Link href="/exhibitor/amref/details">
                            <img
                                className="three_d_view_img"
                                src="https://netrinoimages.s3.eu-west-2.amazonaws.com/2020/03/06/692052/296502/exhibition_stand_three_sides_open_stall_3d_model_c4d_max_obj_fbx_ma_lwo_3ds_3dm_stl_3100465_o.jpg"
                                alt=""
                                title="Scroll to view more"
                            />
                        </Link>
                        <Link href="/exhibitor/amref/details">
                            <img
                                className="three_d_view_img"
                                src="https://netrinoimages.s3.eu-west-2.amazonaws.com/2020/03/06/692052/296502/exhibition_stand_three_sides_open_stall_3d_model_c4d_max_obj_fbx_ma_lwo_3ds_3dm_stl_3100464_o.jpg"
                                alt=""
                                title="Scroll to view more"
                            />
                        </Link>
                    </div>
                </div>
            </div>
            <div className="container">
                <div className="row intro">
                    <div className="col-md-4">
                        <div className="card">
                            <h5 className="card__title-inner">
                                Exhibitors Index
                            </h5>
                            <div className="card-body">
                                <ul>
                                    <li>
                                        <Link href="/exhibitor/amref/details">
                                            Amref Enterprises
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/exhibitor/amref/details">
                                            Amref Enterprises
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/exhibitor/amref/details">
                                            Amref Enterprises
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/exhibitor/amref/details">
                                            Amref Enterprises
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="card">
                            <h5 className="card__title-inner">How it works</h5>
                            <div className="card-body pt-3">
                                <p>
                                    1. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    2. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    3. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    4. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="card">
                            <div className="card-body pt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
